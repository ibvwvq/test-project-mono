@extends('layout\layout')

@section('title')
    Главная
@endsection

@section('content')

    <h4 class="m-2">Клиент</h4>
    <form action="/edit-client/{{$client->id}}/check" method="post">
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
        <input class="form-control m-2" type="text" name="fioClient" value="{{$client->fioClient}}">

        <input class="form-control m-2" type="text" name="genderClient" value="{{$client->genderClient}}">

        <input class="form-control m-2" type="text" name="phoneClient" value="{{$client->phoneClient}}">

        <input class="form-control m-2" type="text" name="addressClient" value="{{$client->addressClient}}">

        <button class="btn btn-success m-2" type="submit">Сохранить</button>

    </form>
    <h5 class="m-2">Автомобили клиента:</h5>

    @foreach($cars as $car)
        <form action="/edit-car/{{$car->id}}/check" method="post">
            @csrf
            <input type="text" name="markCar" id="markCar" placeholder="Введите марку"
                   class="form-control" value="{{$car->markCar}}"><br>
            <input type="text" name="modelCar" id="modelCar" placeholder="Введите модель"
                   class="form-control" value="{{$car->modelCar}}"><br>
            <input type="text" name="colorCar" id="colorCar" placeholder="Введите цвет"
                   class="form-control" value="{{$car->colorCar}}"><br>
            <input type="text" name="numberCar" id="phoneClient" placeholder="Введите гос. номер"
                   class="form-control" value="{{$car->numberCar}}"><br>
            @if($car->availabilityCar)
                <input class="m-2" type="checkbox" id="availabilityCar" name="availabilityCar" checked=checked><br>
            @endif

            @if(!$car->availabilityCar)
                <input class="m-2" type="checkbox" id="availabilityCar" name="availabilityCar"><br>
            @endif
            <a class="btn btn-danger m-2" type="submit"  href="{{route('delete-car-check',$car->id)}}">Удалить</a>
            <button class="btn btn-success m-2" type="submit">Сохранить</button>
        </form>
    @endforeach

    <div>
        {{$cars->links()}}
    </div>




    <form action="/add-car/{{$client->id}}/check" method="post">
        @csrf
        <h5 class="m-2">Добавьте автомобиль для клиента</h5>
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
        <button class="btn btn-success m-2" type="submit">Добавить</button>
    </form>
@endsection
