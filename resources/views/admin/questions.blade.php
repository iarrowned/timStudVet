@extends('admin.layouts.app_admin')
@section('title-block')Questions @endsection

@section('content')
    <section class="answer">
        <div class="container">
            <table>
                <tr>
                    <td>Имя</td>
                    <td>Email</td>
                    <td>Город</td>
                    <td>Животное</td>
                    <td>Возраст</td>
                    <td>Дата вакцинации</td>
                    <td>Питание</td>
                    <td>Тема</td>
                    <td>Вопрос</td>
                    <td>Статус</td>
                    <td>Дата создания</td>
                </tr>
                @foreach($questions as $quest)
                    <tr>
                        <td>{{ $quest->name }}</td>
                        <td>{{ $quest->email }}</td>
                        <td>{{ $quest->city }}</td>
                        <td>{{ $quest->animal }}</td>
                        <td>{{ $quest->age }}</td>
                        <td>{{ $quest->date }}</td>
                        <td>{{ $quest->food }}</td>
                        <td>{{ $quest->theme }}</td>
                        <td>{{ $quest->question }}</td>
                        @if($quest->is_answer == 0)
                            <td style="background-color: indianred;">Не отвечен</td>
                            @else
                            <td style="background-color: greenyellow;">Отвечен</td>
                            @endif

                        <td>{{ $quest->created_at }}</td>
                        @if($quest->is_answer == 0)
                        <td><a href="{{ route('ans', $quest->id) }}">Ответить</a></td>
                        @else
                            <td><a href="{{ route('updateAnswer', $quest->id) }}">Редактировать</a></td>
                        @endif
                        <td><a href="{{ route('deleteQuest', $quest->id) }}">Удалить</a></td>

                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
