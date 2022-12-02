@extends('layouts.app')

@section('title', 'Edit News')

@section('content')
    <section class="main">
        <div class="container">

            <div class="news__write">
                <form class="news__write__form" method="POST" action="{{route('news.update')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="news_id" value="{{$news->id}}">
                    <div class="news__write__card" >
                        <label class="news__write__label" for="title_news">Заголовок</label>
                        <input class="news__write__title" id="title_news" required type="text" name="news_title" value="{{$news->title}}">
                    </div>
                    <div class="news__write__card" >
                        <label class="news__write__label" for="title_news">Изображение</label>
                        <input class="news__write__title" multiple="multiple" required  id="title_news" type="file" name="news_file" value="">
                    </div>
                    <div class="news__write__card" >
                        <label class="news__write__label" for="title_news">Описание</label>
                        <textarea class="news__write__textarea" required name="news_text" id="" cols="30" rows="10">{{$news->text}}</textarea>
                    </div>

                    <button class="news__comment__btn" style="background-color:#66F0A8; " type="submit">Обнавить</button>
                </form>

            </div>

        </div>
    </section>


@endsection
