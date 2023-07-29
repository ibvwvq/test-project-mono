@extends('layout\layout')

@section('title')
    Главная
@endsection


@section('content')
    <a href="/add-client" class="btn btn-primary m-2">Добавить клиента</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Пол</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th>{{$client->fioClient}}</th>
                <th>{{$client->genderClient}}</th>
                <th>{{$client->phoneClient}}</th>
                <th>{{$client->addressClient}}</th>
                <th>
                    <a class="btn btn-outline-primary" href="/edit-client/{{$client->id}}" >Редактировать</a>
                </th>
                <th>
                    <button class="btn btn-danger">Удалить</button>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{$clients->links()}}
    </div>
@endsection
