<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\WalletTypeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalletTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WalletTypeFactory::new()->count(10)->create();
    }
}
