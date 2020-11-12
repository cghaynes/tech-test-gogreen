<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>

    <body>
        <p>Welcome {{$user->name}} ! <a href='/logout'> Not you? Logout</a>

    	<h2>Your RSS Feeds</h2>

    	@if ( !$feeds->count() )
    	<p>You haven't added a feed yet. Please add one below!</p>
    	@else

        <h3>Your Feed List:</h3>        

    	<div class="feed-list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Active</th>
                </tr>
            
                @foreach($feeds as $feed)

                <tr>
                    <td><a href='/feed/{{$feed->id}}'>{{$feed->name}}</a></td>
                    <td>{{$feed->url}}</td>
                    <td>{{$feed->active?'Active':'Inactive'}}</td>
                </tr>

                @endforeach
            </table>
    	</div>
    	@endif



        <h3>Add Feed</h3>
    	<div class="add-feed-form">
    		<form action="/addfeed" method="post">
                @csrf
    			<input type="text" name='name' placeholder='Feed Name' /><br />
    			<input type='text' name='URL' placeholder='http://feeds.bbci.co.uk/news/world/rss.xml' /><br />
    			<input type="submit" value='Add' />
    		</form>
    	</div>


        <hr>
        
        <h3>Your News</h3>


        @foreach($content as $newsitem)
        <div class="newsitem">
        <a href="{{$newsitem['link']}}">{{$newsitem['title']}}</a> - <span class="date">{{date('Y-m-d h:i:s',$newsitem['date'])}}</span> - <i>{{ $newsitem['feed'] }}</i>
        <br/>
        <p>{{$newsitem['description']}}</p>
        </div>

        @endforeach




    



    </body>


</html>