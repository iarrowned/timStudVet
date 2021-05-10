@extends('admin.layouts.app_admin')
@section('title-block')Questions @endsection

@section('content')
    <section class="otvet">
        <div class="container">
            <div class="content">
                <h2>{{ $quest->name }}</h2>
                <p>{{ $quest->email }}</p>
                <p>{{ $quest->city }}</p>
                <p>{{ $quest->animal }}</p>
                <p>{{ $quest->age }}</p>
                <p>{{ $quest->date }}</p>
                <p class="theme">{{ $quest->theme }}</p>
                <p class="quest">{{ $quest->question }}</p>
                @if($quest->path)
                    <img src="{{ asset('/storage/'.$quest->path) }}" alt="s" style="max-width: 700px;">
                @else
                    <h2>{{ $quest->path }}</h2>
                @endif
            </div>
            <form action="{{ route('updateAnswerSubmit', $quest->id) }}" method="post">
                @csrf
                <textarea name="answer">{{ $ans->answer }}</textarea>
                <input type="submit">
            </form>
        </div>
    </section>
@endsection
