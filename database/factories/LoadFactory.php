<?php

namespace Database\Factories;

use App\Models\Load;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoadFactory extends Factory
{
    protected $model = Load::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'weight'=>$this->faker->randomNumber()
        ];
    }
}
