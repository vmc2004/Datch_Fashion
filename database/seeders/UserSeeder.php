<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('users')->insert([
                'fullname' => fake()->text('20'),
                'phone' => fake()->numerify('###########'),
                'address' => fake()->address(),
                'email' => fake()->email(),
                'password' => fake()->password(),
                'status' => fake()->numberBetween(0,1),
            ]);
        }
    }
}
