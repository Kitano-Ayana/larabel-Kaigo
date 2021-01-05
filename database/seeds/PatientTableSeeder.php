<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;


class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //100個のダミーを追加
        factory(Patient::class,100)->create();
    }
}
