<?php

namespace Database\Factories;

use App\Models\MessageAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageAdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'motif' =>$this->faker->sentence(6),
            'user_id' => rand(1, 10),
            'content' => $this->faker->sentence(20),
        ];
    }
}
