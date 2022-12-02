@extends('layouts.app')

@section('title', 'Personal Area')

@section('content')
    <section class="main">
        <div class="container">

            @foreach($news as $new)

                <div class="news__main js__news__main">
                    <img class="news__img" alt="" src="{{asset('img/first.png')}}">
                    <div class="news__info">
                        <a href="/news/{{$new->slug_name}}" style="text-decoration: none;color:#000000;display: block">
                            <span class="news__title">{{$new->title}}</span>
                            <span class="news__short__text">
                            {{substr($new->text,0,50)}}
                        </span>
                        </a>
                        <div style=" margin-top: 8px">
                            <a href="{{route('news.edit').'/'.$new->id}}" style="font-size:16px;padding: 8px; background-color: #315BFF; color: #ffffff;border-radius: 5px">Edit</a>
                            <a href="{{route('news.delete').'/'.$new->id}}" style="font-size:16px;padding: 8px; background-color: red; color: #ffffff;border-radius: 5px">Delete</a>
                        </div>

                        <span class="news__publish__date">{{$new->created_at}}</span>

                    </div>

                </div>
            @endforeach
        </div>
    </section>


@endsection
