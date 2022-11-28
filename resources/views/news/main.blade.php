@extends('layouts.app')

@section('title', 'Personal Area')

@section('content')
<section class="main">
    <div class="container">

        <div style="display: flex;margin-bottom:20px">
            <div class="news__section">
                <span class="tags__title">Новости</span>
                <div class="news__card js__news__card">
                    @include('news.module.news_text')
                </div>

                <input class="row__count js__row__count" type="text" value="{{count($news)}}">
                <input class="all__count js__all__count" type="text" value="{{$all}}">

                <span class="view__more__btn js__view__more__btn">Показать еще</span>
            </div>

            @include('news.module.tags')

        </div>
    </div>
</section>


@endsection



