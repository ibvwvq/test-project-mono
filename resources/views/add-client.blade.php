@extends('layout\layout')

@section('title')
    Главная
@endsection


@section('content')
    <form class="" method="post" action="/add-client/check">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <h4>Добавьте клиента</h4>

        <input type="text" name="fioClient" id="fioClient" placeholder="Введите имя клиента"
               class="form-control"><br>
        <input type="text" name="genderClient" id="genderClient" placeholder="Введите пол"
               class="form-control"><br>
        <input type="text" name="phoneClient" id="phoneClient" placeholder="Введите номер телефона"
               class="form-control"><br>
        <input type="text" name="addressClient" id="addressClient" placeholder="Введите адрес"
               class="form-control"><br>


        <h5>Добавьте автомобиль для клиента</h5>
        <input type="text" name="markCar" id="markCar" placeholder="Введите марку"
               class="form-control"><br>

        <input type="text" name="modelCar" id="modelCar" placeholder="Введите модель"
               class="form-control"><br>

        <input type="text" name="colorCar" id="colorCar" placeholder="Введите цвет"
               class="form-control"><br>

        <input type="text" name="numberCar" id="phoneClient" placeholder="Введите гос. номер"
               class="form-control"><br>
         <p class="m-2">
             Укажите, есть ли машина на автостоянке
             <input class="m-2" type="checkbox" id="availabilityCar" name="availabilityCar"><br>
         </p>

        <button class="btn btn-success m-2" type="submit">Отправить</button>
    </form>
@endsection
