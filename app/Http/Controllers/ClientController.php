<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\ClientRequest;
use App\Models\Car;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function get_clients()
    {
        $clients = DB::table('clients')->paginate(8);
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
            [CarController::class,'add_car']($carRequest, $car, $client);
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

    public function edit_client_check($id,ClientRequest $clientRequest): \Illuminate\Http\RedirectResponse
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

    public function delete_client_check($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('clients')->where('id', '=', $id)->delete();
        return redirect()->route('get-clients')->with('Success','ItsOk');
    }

}
