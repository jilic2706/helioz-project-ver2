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
        $date_from = $this->faker->date();
        $date_to = $this->faker->date();
        while($date_from > $date_to) {
            $date_to = $this->faker->date();
        }
        return [
            'status' => "pending",
            //'date_from' => new DateTime("now", new DateTimeZone("CET")),
            //'date_to' => $this->faker->dateTimeBetween("now", "+3 weeks"),
            'date_from' => $date_from,
            'date_to' => $date_to,
            'reason' => $this->faker->sentence(3),
        ];
    }
}
