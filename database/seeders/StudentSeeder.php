<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected function generateSession()
    {
        $startYear = rand(2000, 2020); // Adjust the range as needed
        $endYear = $startYear + 1;
        return $startYear . '-' . $endYear;
    }
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i=0;$i<20;$i++){
            DB::table('students')->insert([
                'name' => $faker->name,
                'session' => $this->generateSession(),
                'roll' => str_pad($faker->unique()->randomNumber(8), 8, '0', STR_PAD_LEFT),
                'email' => $faker->unique()->safeEmail,
                'phone' => substr($faker->phoneNumber, 0, 10),
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
