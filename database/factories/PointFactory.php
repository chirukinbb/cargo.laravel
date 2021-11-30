<?php

namespace Database\Factories;

use App\Models\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    protected $model = Point::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->name().' - '.$this->faker->name(),
            'date_time'=>$this->faker->dateTime()
        ];
    }
}
