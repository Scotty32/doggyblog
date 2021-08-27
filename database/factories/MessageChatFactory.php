<?php

namespace Database\Factories;

use App\Models\MessageChat;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageChatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageChat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'content' => $this->faker->sentence(20),
        ];
    }
}
