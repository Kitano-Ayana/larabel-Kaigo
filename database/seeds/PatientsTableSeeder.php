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
        
       
        $patients = factory(Patient::class, 25)->create();
               
                
        
    }
}
