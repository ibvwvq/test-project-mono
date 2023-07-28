<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\ClientRequest;
use App\Models\Car;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function get_clients()
    {
        $clients = DB::table('clients')->paginate(3);
        return view('welcome', ['clients' => $clients]);
    }

    public function add_client(ClientRequest $clientRequest,CarRequest $carRequest)
    {
        $client = new Client();
        $car = new Car();

        $client->fioClient = $clientRequest->input('fioClient');
        $client->genderClient = $clientRequest->input('genderClient');
        $client->phoneClient = $clientRequest->input('phoneClient');
        $client->addressClient = $clientRequest->input('addressClient');
        $client->save();

       if($client->save()){
           $car->markCar = $carRequest->input('markCar');
           $car->modelCar = $carRequest->input('modelCar');
           $car->colorCar = $carRequest->input('colorCar');
           $car->numberCar = $carRequest->input('numberCar');
           if($carRequest->input('availabilityCar')==null){
               $car->availabilityCar =  0;
           }else{
               $car->availabilityCar =  1;
           }

           $car->client_id = $client->id;

           $car->save();
       }

        return redirect()->route('welcome');
    }
}
