<div class="tags__section">
    <span class="tags__title">УЗНАЙТЕ БОЛЬШЕ О ВАЖНОМ ДЛЯ ВАС</span>

    <div class="tags__block">

        @foreach($tags as $tag)
            <a href="{{config('app.url').'tags/'.$tag->id}}" class="tag">{{$tag->tag_name}}</a>
        @endforeach

{{--        <span class="tag">Programming</span>--}}
{{--        <span class="tag">Relationships</span>--}}
{{--        <span class="tag">Data Science</span>--}}
{{--        <span class="tag">Politics</span>--}}
{{--        <span class="tag">Javascript</span>--}}
{{--        <span class="tag">Machine Learning</span>--}}
{{--        <span class="tag">Economy</span>--}}
{{--        <span class="tag">Ecology</span>--}}
{{--        <span class="tag">Love Story</span>--}}
{{--        <span class="tag">Sports</span>--}}
{{--        <span class="tag">Football</span>--}}
{{--        <span class="tag">Productivity</span>--}}
{{--        <span class="tag">Life</span>--}}
{{--        <span class="tag">Sports</span>--}}
{{--        <span class="tag">Real Madrid</span>--}}
{{--        <span class="tag">Turkmenistan</span>--}}
{{--        <span class="tag">Koneurgench</span>--}}
{{--        <span class="tag">University</span>--}}
    </div>
</div>
