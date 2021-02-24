<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'              => 'test1',
            'email'             => 'test1@test.com',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);

        
    }
}
