<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
        

            
                Patient::create([
                    'user_id' => 1,
                    'patient_name'=> $faker->name,
                    'email' => $faker->unique()->email,
                    'gender'=>$faker->randomElement(['0','1']),
                    'age'=> $faker->randomNumber(2),        
                ]);
            
        
    }
}
