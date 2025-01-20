<?php

namespace Database\Factories;

use App\Models\WalletType;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletTypeFactory extends Factory
{
    protected $model = WalletType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'minimum_balance' => $this->faker->randomFloat(2, 10, 1000),
            'monthly_interest_rate' => $this->faker->randomFloat(1, 1, 10),
        ];
    }
}
