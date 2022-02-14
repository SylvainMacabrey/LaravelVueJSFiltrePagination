<?php

namespace Database\Factories;

use App\Models\Lot;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lot>
 */
class LotFactory extends Factory
{

    protected $model = Lot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $programs_id = Program::all()->pluck('id');
        return [
            "number" => "A" . rand(100, 999),
            "area" => rand(30, 150),
            "price" => rand(100000, 500000),
            "program_id" => $this->faker->randomElement($programs_id)
        ];
    }
}
