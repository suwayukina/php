<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OfficeMaster;


class OfficeMasterFactory extends Factory
{
    protected $model = OfficeMaster::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => $this->faker->regexify('[0][0][0][0][0][0-9]{3}'),
            'deploy_cd' => $this->faker->randomNumber(2),
            'assignmentdate' => $this->faker->dateTimeThisYear,
            'update_by' => $this->faker->firstName,
        ];
    }
}
