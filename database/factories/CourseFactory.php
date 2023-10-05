<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $status = ['Published', 'Published', 'Published', 'Draft'];

        return [
            'name'=>$this->faker->bs(),
            'start_date'=>$this->faker->dateTimeInInterval('-1 week', '+1 year'),
            'end_date'=>$this->faker->dateTimeInInterval('-1 week', '+1 year'),
            'status'=>$status[rand(0,3)],
            'cpd_hours'=>$this->faker->randomDigitNot(2),
            //
        ];
    }
}
