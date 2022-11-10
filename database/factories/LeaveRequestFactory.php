<?php

namespace Database\Factories;

use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => "pending",
            'date_from' => new DateTime("now", new DateTimeZone("CET")),
            'date_to' => $this->faker->dateTimeBetween("now", "+3 weeks"),
            'reason' => $this->faker->sentence(3),
        ];
    }
}
