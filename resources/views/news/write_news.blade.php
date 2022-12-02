@extends('layouts.app')

@section('title', 'Personal Area')

@section('content')
    <section class="main">
        <div class="container">

            <div class="news__write">
                <form class="news__write__form" method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="news__write__card" >
                        <label class="news__write__label" for="title_news">Заголовок</label>
                        <input class="news__write__title" id="title_news" required type="text" name="news_title" value="">
                    </div>
                    <div class="news__write__card" >
                        <label class="news__write__label" for="title_news">Изображение</label>
                        <input class="news__write__title" required multiple="multiple"  id="title_news" type="file" name="news_file" value="">
                    </div>
                    <div class="news__write__card" >
                        <label class="news__write__label" for="title_news">Описание</label>
                        <textarea class="news__write__textarea" required name="news_text" id="" cols="30" rows="10"></textarea>
                    </div>

                    <button class="news__comment__btn" type="submit">Отправить</button>
                </form>

            </div>

        </div>
    </section>


@endsection
