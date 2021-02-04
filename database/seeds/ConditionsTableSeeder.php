<?php

use Illuminate\Database\Seeder;
use App\Models\Condition;
use Faker\Factory as Faker;


class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');


        for($id = 1; $id < 301; $id++){
            Condition::create([
                'patient_id' => $id,
                'comment'=> $faker->realText(20),
                'weight' => $faker->numberBetween($min =50,$max=60),
                'high_pressure'=>$faker->numberBetween($min=100,$max=130),
                'low_pressure'=> $faker->numberBetween($min=70,$max=85),
                'toilet' =>  $faker->randomElement(['0','1']),
                'medicine' => 0       
                  ]);
 
            }
    }
}
