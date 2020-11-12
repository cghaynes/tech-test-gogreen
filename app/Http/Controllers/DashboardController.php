<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feed;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
    	// Load Feeds on the Dashboard

    	
		if (Auth::check()) {
    		
    		$user = Auth::user();

    		$feeds = $user->feeds()->get();

            $content = [];

            foreach($feeds as $feed) {


                if($feed->active) {

                    $ch = curl_init($feed->url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    $data = curl_exec($ch);
                    curl_close($ch);

                    $feed_contents = simplexml_load_string($data);


                    
                    foreach($feed_contents->channel->item as $item) {

                        $article = [];

                        $article['link'] = $item->link;
                        $article['title'] = $item->title;
                        $article['date'] = strtotime($item->pubDate);
                        $article['description'] = $item->description;
                        $article['feed'] = $feed->name;

                        $content[] = $article;

                    }
                }   
            }

            usort($content, function($array1, $array2) {
                return $array1['date'] - $array2['date'];
            });

            $content = array_reverse($content);


            


    		
    		return view('member/dashboard', ['feeds' => $feeds, 'content' => $content, 'user' => $user]);
		}

    	return view('guest/index');
    }

    public function loadSingularFeed(Request $request) {

        if (Auth::check()) {

            $user = Auth::user();

            $id = $request->route('id');
            $feed = $user->feeds()->find($id);
            $content = [];

            $ch = curl_init($feed->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);

            $feed_contents = simplexml_load_string($data);


            
            foreach($feed_contents->channel->item as $item) {

                $article = [];

                $article['link'] = $item->link;
                $article['title'] = $item->title;
                $article['date'] = strtotime($item->pubDate);
                $article['description'] = $item->description;
                $article['feed'] = $feed->name;

                $content[] = $article;

            }

            return view('member/singularfeed', ['feed' => $feed, 'content' => $content]);
        }


    }


    public function addFeed(Request $request) 
    {
        if (Auth::check()) {

            $user = Auth::user();

            $feed = new Feed();

            $feed->url = $request->URL;
            $feed->name = $request->name;
            $feed->active = true;
            $feed->user_id = $user->id;


            $feed->save();

            return redirect()->action([DashboardController::class, 'index']);
        }

        return view('guest/index');
    }

    public function date_compare($array1, $array2) {
        return $array1['date'] - $array2['date'];
    }
}
