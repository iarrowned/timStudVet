@extends('admin.layouts.app_admin')
@section('title-block')Posts @endsection

@section('content')
<section class="categories">
    <div class="container">
        <div class="cats">
            <form action="{{ route('addPostSubmit', $cat) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Title">
                <textarea placeholder="Text" name="text" cols="30" rows="10"></textarea>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <input type="file" name="preview">
                <input type="submit">
            </form>


        </div>
    </div>
</section>
@endsection

