<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>

    <body>
        <a href='/'><< Back to full feed list</a><br />
    	<h2>Your RSS Feeds</h2>


        <h3>{{ $feed->title }}</h3>


        @foreach($content as $newsitem)
        <div class="newsitem">
        <a href="{{$newsitem['link']}}">{{$newsitem['title']}}</a> - <span class="date">{{date('Y-m-d h:i:s',$newsitem['date'])}}</span> - <i>{{ $newsitem['feed'] }}</i>
        <br/>
        <p>{{$newsitem['description']}}</p>
        </div>

        @endforeach




    



    </body>


</html>