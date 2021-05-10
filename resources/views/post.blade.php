@extends('layouts.app')
@section('title-block'){{ $post->title }}@endsection

@section('content')
<section class="page">
    <div class="container">
        <div class="title">
            <a href="/">Главная</a>
            <p>/{{ $page_name }}</p>
        </div>
        <div class="content">
            <div class="category">
                @foreach($categories as $category)
                    <a href="{{ route('catsCareByCategory', [$page ,$category->id]) }}">{{ $category->category_name }}</a>
                @endforeach

            </div>
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <div class="item"><p>{{ $post->text }}</p></div>
            </div>
            <a href="#" class="up"></a>
        </div>
    </div>
</section>
@endsection
