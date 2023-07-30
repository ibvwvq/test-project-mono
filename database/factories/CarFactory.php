<?php

namespace Database\Factories;


use App\Models\Car;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * @var string
     */

    protected $model = Car::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $result = '';
        $arrayStr = range('a','z');
        $arrayNum = range('0','9');
        for($i = 0; $i < 1; $i++){
            $result .= $arrayStr[mt_rand(0, 25)];
            for($i = 0; $i < 3; $i++){
                $result .= $arrayNum[mt_rand(0, 9)];
            }
            for($i = 0; $i < 2; $i++){
                $result .= $arrayStr[mt_rand(0, 25)];
            }
        }

        return [
            'markCar' => $this->faker->name,
            'modelCar' =>  $this->faker->name,
            'colorCar' => $this->faker->name,
            'numberCar' => $result,
            'availabilityCar' => rand(0,1),
            'client_id' => Client::get()->random()->id

        ];
    }
}
