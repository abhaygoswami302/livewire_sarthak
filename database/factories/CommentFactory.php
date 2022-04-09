<?php

namespace Database\Factories;

use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        $si = SupportTicket::all()->random();
        return [
            'body' => $this->faker->realText(200,2),
            'user_id' => $user->id,
            'support_ticket_id' => $si->id,
        ];
    }
}
