{{--<div class="container">--}}
    <div class="search__result" style="">
        <span style="font-size:16px ">Новости</span>
        <div style="margin-left: 5px">
            @foreach($news as $new)
            <a style="color: #315BFF; display: block" href="http://127.0.0.1:8000/news/{{$new->slug_name}}">{{$new->title}}</a>
            @endforeach
        </div>
        <span style="font-size:16px ">Теги</span>
        <div style="margin-left: 5px">
            @foreach($tags as $tag)
            <a style="color: #315BFF; display: block" href="http://127.0.0.1:8000/news/{{$tag->id}}">{{$tag->tag_name}}</a>
            @endforeach
{{--            <a style="color: #315BFF; " href="http://127.0.0.1:8000/news/in-eos-laboriosam-libero">#политика</a>--}}
        </div>
    </div>
{{--</div>--}}
