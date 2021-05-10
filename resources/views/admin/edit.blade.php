@extends('admin.layouts.app_admin')
@section('title-block')Edit category @endsection

@section('content')
    <section class="edit">
        <form action="{{ route('catEditSubmit', [$cat, $id]) }}" method="post">
            @csrf
            <input type="text" name="cat_name" value="{{ $title }}">
            <input type="submit">
        </form>
    </section>

    <section class="addpost">
        <form action="">
            <select name="cats">

            </select>

        </form>
    </section>

@endsection
