<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * @var string
     */

    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $result = '';
        for ($i = 0; $i < 10; $i++) {
            $result .= mt_rand(0, 9);
        }
        return [
            'fioClient' => $this->faker->name(),
            'genderClient' => $this->faker->name(),
            'phoneClient' => '+7'.$result,
            'addressClient' => $this->faker->name()
        ];
    }
}
