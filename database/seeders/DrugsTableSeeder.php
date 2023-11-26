<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Drug;
use Faker\Factory as Faker;

class DrugsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $name = $faker->unique()->realText(30);
            $quantity = $faker->numberBetween(1, 100);
            $price = $faker->randomFloat(2, 1, 100);

            Drug::create([
                'name' => $name,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }
    }
}
