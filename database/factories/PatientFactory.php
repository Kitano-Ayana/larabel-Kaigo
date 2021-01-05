<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        //
        'user_id' => 1,
        'patient_name'=> $faker->name,
        'email' => $faker->unique()->email,
        'gender'=>$faker->randomElement(['0','1']),
        'age'=> $faker->randomNumber(2)

    ];
});
