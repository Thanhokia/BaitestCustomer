<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        foreach (range(1, 50) as $index) {
            DB::table('customers')->insert([
                'email' => $faker->unique()->safeEmail, 
                'password' => 'password', 
                'status' => $faker->randomElement(['active', 'inactive', 'banned']), 
                'account_type' => $faker->randomElement(['basic', 'premium', 'enterprise']), 
                'last_login' => $faker->optional()->dateTimeThisYear(), 
                'created_at' => now(), 
                'updated_at' => now(), 
            ]);
        }
    }
}
