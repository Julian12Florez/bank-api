<?php

namespace Database\Factories;

use App\Models\{Account,User};
use Illuminate\Database\Eloquent\Factories\Factory;


class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        return [
            'number' => $this->faker->unique()->creditCardNumber(),
            'balance' => $this->faker->randomNumber(9, true),
            'user_id' => $this->faker->randomElement($users)
        ];
    }
}
