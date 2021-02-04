<?php

namespace Tests\Feature;

use App\Models\Patient;
use App\User;
use Illuminate\Database\Seeder;
use database\seeds\PatientsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePatient;
use Log;




class PatientTest extends TestCase
{
    use RefreshDatabase;

    public function test_Index()
    {
        //ダミーデータを１件作成
        $this->seed('PatientsTableSeeder');
        $this->patient = Patient::first();

      $user     = factory(User::class)->create();
        $response = $this->actingAs($user)
                   ->get(route('patient.index'))
                   ->assertOk();
                   
        
    }

    public function testStore()
    {
      $user     = factory(User::class)->create();
      $data =[
                'id' => '100000',
                'user_id' => $user->id,//ここ
                'patient_name' => 'test',
                'email'=> 'test@test.com',
                'gender' => '0',
                'age' => '43',
                'created_at' => now(),
                'updated_at' => now()
        ];

        $response = $this->actingAs($user)
                     ->followingRedirects()
                     ->post(route('patient.store',$data))
                     ->assertOk();

    }
    

      public function testDestroy()
    {
        $user     = factory(User::class)->create();

        $patient = new Patient;

        $patient->id = 100000;
        $patient->user_id = $user->id;
        $patient->patient_name = 'test' ;
        $patient->email = 'test@test.com';
        $patient->age = '43';
        $patient->gender = '0';
        $patient->created_at = now();
        $patient->updated_at = now();

        $patient->save();

        $this->withoutExceptionHandling();

        $response = $this->actingAs($user)
                   ->followingRedirects()
                   ->delete(route('patient.destroy', ['id' => 100000]))
                    ->assertOk();

     $this->assertEquals(0, Patient::count());

    }

    


}
