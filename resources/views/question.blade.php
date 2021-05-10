@extends('layouts.app')
@section('title-block')Вопрос/ответ @endsection

@section('content')
    <section class="que">

        <div class="container">
            <div class="title">
                <a href="#">Главная/</a><p>Вопрос/ответ</p>
            </div>
            <div class="content">
                <img src="../img/lastdog.png" alt=""
                     class="dog">
                <div class="main">
                    <form action="{{ route('questSubmit') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="left">
                            <input type="text" name="name" placeholder="Ваше имя*">
                            <input type="email" name="email" placeholder="Email*">
                            <input type="text" name="city" placeholder="Город*">
                            <input type="text" name="animal" placeholder="Вид животного*">
                            <input type="text" name="age" placeholder="Возраст животного*">
                            <label for="date">Дата последней вакцинации*</label>
                            <input type="date" id="date" name="date">
                            <input type="text" name="food" placeholder="Питание*">
                        </div>
                        <div class="right">
                            <input type="text" name="theme" placeholder="Краткое описание">
                            <input type="file" name="file" multiple>
                            <textarea name="question"></textarea>
                            <input type="submit" class="btn">
                        </div>
                    </form>
                </div>
                <img src="../img/lastcat.png" alt="" class="cat">
            </div>
            <p class="rot">Ответ на Ваш вопрос будет опубликован на этой странице. Также Вы можете получить ответ по e-mail, для этого необходимо заполнить соответствующее поле перед отправкой Вашего вопроса.</p>
            @if($errors->any())
                <ul class="queErrors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </section>
@endsection
