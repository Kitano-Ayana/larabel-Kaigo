<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);

        for($i = 0; $i < 20; $i++){
            $this->call(PatientsTableSeeder::class);
        }

        for($id = 0; $id < 30; $id++){
            $this->call(ConditionsTableSeeder::class);
        }

    }
}
