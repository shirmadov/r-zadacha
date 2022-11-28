@foreach($news as $new)

    <div class="news__main js__news__main">
        <img class="news__img" alt="" src="{{asset('img/first.png')}}">
        <div class="news__info">
            <a href="/news/{{$new->slug_name}}" style="text-decoration: none;color:#000000;display: block">
                <span class="news__title">{{$new->title}}</span>
                <span class="news__short__text">
                            {{substr($new->text,0,100)}}
                        </span>
            </a>

            <span class="news__publish__date">{{$new->created_at}}</span>

        </div>

    </div>
@endforeach
