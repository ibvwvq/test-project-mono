<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function edit_car_check($id,CarRequest $carRequest): \Illuminate\Http\RedirectResponse
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

    public function delete_client_check($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('clients')->where('id', '=', $id)->delete();
        return redirect()->route('get-clients')->with('Success','ItsOk');
    }

    public function delete_car_check($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('cars')->where('id', '=', $id)->delete();
        return redirect()->route('get-clients')->with('Success','ItsOk');
    }
}
