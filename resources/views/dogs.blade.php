@extends('layouts.app')
@section('title-block')Собаки@endsection
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
                            <a href="{{ route('dogsCareByCategory', [$page ,$category->id]) }}">{{ $category->category_name }}</a>
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
                                @if($post->preview)
                                    <img src="{{ asset('storage/'.$post->preview) }}" alt="qwe" style="width: 288px; height: 181px;">
                                @else
                                    <img src="{{ asset('img/postcat.png') }}" alt="img not found" style="width: 288px; height: 181px;">
                                @endif

                                <div class="text">
                                    <p>{{ substr($post->text, 0, 900) }}</p>
                                    <a href="{{ route('dogsPost', [$page ,$category->id, $post->id]) }}">Узнать больше →</a>
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
