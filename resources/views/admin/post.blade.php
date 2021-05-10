@extends('admin.layouts.app_admin')
@section('title-block')Posts @endsection

@section('content')
<section class="categories">
    <div class="container">
        <div class="cats">
            <h2>Dogs posts</h2>
            <ul>
                @foreach($dog_posts as $post)
                    <li><a href="{{ route('updatePost', ['dog', $post->id]) }}">{{ $post->title }}</a> <span>{{ $dogs_categories->where('id', $post->category_id)->first()->category_name }}</span>
                        <a href="{{ route('deletePost', ['dog', $post->id]) }}"> Del</a></li>
                @endforeach
            </ul>
            <a href="{{ route('addPost', 'dog') }}">Add post</a>
        </div>
        <div class="cats">
            <h2>Cats posts</h2>
            <ul>
                @foreach($cat_posts as $post)
                    <li><a href="{{ route('updatePost', ['cat', $post->id]) }}">{{ $post->title }}</a> <span>{{ $cats_categories->where('id', $post->category_id)->first()->category_name }}</span>
                        <a href="{{ route('deletePost', ['cat', $post->id]) }}"> Del</a></li>
                @endforeach
            </ul>
            <a href="{{ route('addPost', 'cat') }}">Add post</a>
        </div>
    </div>
</section>
@endsection

