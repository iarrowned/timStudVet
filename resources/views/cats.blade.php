@extends('layouts.app')
@section('title-block')Кошки@endsection
@section('content')
<section class="posts">
    <div class="container">
        <div class="title">
            <a href="/">Главная</a>
            <p>/{{ $name }}</p>
        </div>
        <div class="content">
            <div class="category">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <a href="{{ route('catsCareByCategory', [$page ,$category->id]) }}">{{ $category->category_name }}</a>
                    @endforeach
                @else
                    <h2>Категорий еще нет</h2>
                @endif
            </div>
            <div class="post">
                @if($current)
                    <h2>{{ $current }}</h2>
                @endif
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="item">
                            <img src="{{ asset('img/postcat.png') }}" alt="img not found">
                            <div class="text">
                                <p>{{ substr($post->text, 0, 900) }}</p>
                                <a href="{{ route('catsPost', [$page ,$category->id, $post->id]) }}">Узнать больше →</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>Постов в данной категории еще нет</h2>
                @endif

                <a href="#" class="up"></a>
            </div>
        </div>
    </div>
</section>
@endsection
