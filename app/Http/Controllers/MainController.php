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

    public function add_client(ClientRequest $clientRequest, CarRequest $carRequest): \Illuminate\Http\RedirectResponse
    {
        $client = new Client();
        $car = new Car();

        $client->fioClient = $clientRequest->input('fioClient');
        $client->genderClient = $clientRequest->input('genderClient');
        $client->phoneClient = $clientRequest->input('phoneClient');
        $client->addressClient = $clientRequest->input('addressClient');
        $client->save();
        if ($client->save()) {
            $this->add_car($carRequest, $car, $client);
        }

        return redirect()->route('get-clients');
    }

    public function edit_client($id)
    {
        $client = DB::table('clients')
            ->where('id', '=', $id)
            ->first();
        $cars = DB::table('cars')
            ->where('client_id', '=', $id)
            ->paginate(2);

        return view('edit-client', ['client' => $client, 'cars' => $cars]);
    }

    public function edit_client_check($id,ClientRequest $clientRequest)
    {
        $client = DB::table('clients')
            ->where('id', '=', $id)
            ->update([
                'fioClient' => $clientRequest->input('fioClient'),
                'genderClient' => $clientRequest->input('genderClient'),
                'phoneClient' => $clientRequest->input('phoneClient'),
                'addressClient' => $clientRequest->input('addressClient')]);

        return redirect()->route('get-clients')->with('Success','ItsOk');
    }

    public function edit_car_check($id,CarRequest $carRequest)
    {
        if ($carRequest->input('availabilityCar') == null) {
             DB::table('cars')
                ->where('id', '=', $id)
                ->update([
                    'availabilityCar' => 0,
                ]);
        } else {
             DB::table('cars')
                ->where('id', '=', $id)
                ->update([
                    'availabilityCar' => 1,
                ]);
        }
            DB::table('cars')
            ->where('id', '=', $id)
            ->update([
                'markCar' => $carRequest->input('markCar'),
                'modelCar' => $carRequest->input('modelCar'),
                'colorCar' => $carRequest->input('colorCar'),
                'numberCar' => $carRequest->input('numberCar'),
            ]);

        return redirect()->route('get-clients')->with('Success','ItsOk');
    }
    /**
     * @param CarRequest $carRequest
     * @param Car $car
     * @param $client
     * @return void
     */
    public function add_car(CarRequest $carRequest, Car $car, $client): void
    {
        $car->markCar = $carRequest->input('markCar');
        $car->modelCar = $carRequest->input('modelCar');
        $car->colorCar = $carRequest->input('colorCar');
        $car->numberCar = $carRequest->input('numberCar');
        if ($carRequest->input('availabilityCar') == null) {
            $car->availabilityCar = 0;
        } else {
            $car->availabilityCar = 1;
        }
        $car->client_id = $client->id;
        $car->save();
    }

    public function add_car_check($id,CarRequest $carRequest){
        $car = new Car();

        $client = DB::table('clients')
            ->where('id', '=', $id)
            ->first();

        $this->add_car($carRequest, $car, $client);
        return redirect()->route('get-clients')->with('Success','ItsOk');
    }
}
