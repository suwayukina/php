<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;
use App\Models\OfficeMaster;


class PersonFactory extends Factory
{
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = OfficeMaster::all()->random(1)[0]->user_id;

        return [
            //
            'name' => $this->faker->name,
            'age' => $this->faker->randomNumber(2),
            'phone' => $this->faker->phoneNumber,
            'usercd' => $this->faker->randomNumber(2),
            'usercd'=> $user_id,
        ];
    }
}
