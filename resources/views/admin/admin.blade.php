@extends('admin.layouts.app_admin')
@section('title-block')Categories @endsection

@section('content')
<section class="categories">
    <div class="container">
        <div class="cats">
            <h2>Dogs categories</h2>
            <ul>
                @foreach($dogs_category as $cat)
                <li>{{ $cat->category_name }}<a href="{{ route('catDelete', [1, $cat->id]) }}"> X</a>
                    <a href="{{ route('catEdit', [1, $cat->id]) }}">Edit</a></li>
                @endforeach
            </ul>
            <form action="{{ route('catCreate', 1) }}" method="post">
                @csrf
                <select name="page_id">
                    <option value="1">Уход</option>
                    <option value="2">Кормление</option>
                    <option value="3">Содержание</option>
                    <option value="4">Репродукция</option>
                </select>
                <input type="text" name="category_name" placeholder="Category name">
                <input type="submit">
            </form>
        </div>
        <div class="cats">
            <h2>Cats categories</h2>
            <ul>
                @foreach($cats_category as $cat)
                    <li>{{ $cat->category_name }}<a href="{{ route('catDelete', [2, $cat->id]) }}"> X</a>
                        <a href="{{ route('catEdit', [2, $cat->id]) }}">Edit</a></li>
                @endforeach
            </ul>
            <form action="{{ route('catCreate', 2) }}" method="post">
                @csrf
                <select name="page_id">
                    <option value="1">Уход</option>
                    <option value="2">Кормление</option>
                    <option value="3">Содержание</option>
                    <option value="4">Репродукция</option>
                </select>
                <input type="text" name="category_name" placeholder="Category name">
                <input type="submit">
            </form>
        </div>
    </div>
</section>
@endsection

