@extends('admin.layouts.app_admin')
@section('title-block')Posts @endsection

@section('content')
<section class="categories">
    <div class="container">
        <div class="cats">
            <form action="{{ route('updatePostSubmit', [$cat, $post->id]) }}" method="post">
                @csrf
                <input type="text" name="title" value="{{ $post->title }}">
                <textarea name="text" cols="30" rows="10">{{ $post->text }}</textarea>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $current_cat->id)
                                                                selected="selected"
                            @endif>{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <input type="submit">
            </form>


        </div>
    </div>
</section>
@endsection

