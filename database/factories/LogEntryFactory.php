<?php

namespace Database\Factories;

use App\Models\LogEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Arr;

class LogEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogEntry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'activity_date' => $this->faker->date('m/d/Y'),
            'activity' => $this->faker->sentence(rand(5,16)),
            'minutes' => rand(0,10) * 5,
            'status' => Arr::random(['pending','verified'])
        ];
    }
}
