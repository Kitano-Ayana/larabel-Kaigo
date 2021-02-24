<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\User;
use App\Models\Admin;
use App\Http\Requests\StorePatient;
use App\Services\CheckPatientData;
use Carbon\Carbon;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $users = DB::table('users')->get();
    

        return view('admin.user',compact('users'));

    }
    //$id = $user->id
    public function patientIndex($id)
    {
        $user = User::find($id);

        $patients = Patient::where('user_id', $id )
                    ->get();


        return view('admin.patient.index',compact('patients','user'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patientShow($id)
    {
        $patient = Patient::find($id);

        $conditions = Condition::where('patient_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $gender = CheckPatientData::checkGender($patient);


        $condition = Condition::find($id);


        return view('admin.patient.show',compact('patient','gender'));

        
    }

    public function conditionIndex($id)
    {
        $patient = Patient::find($id);

        $conditions = Condition::where('patient_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $gender = CheckPatientData::checkGender($patient);

        $condition = Condition::find($id);


        return view('admin.condition.index', compact('conditions','patient','condition','gender'));
        
    }

    public function conditionShow($id){
        $condition = Condition::find($id);

        $patient_id = $condition->patient_id;
        
        $patient = Patient::find($patient_id);
    
        if($condition->toilet === 0){
          $toilet = 'トイレあり';
        }
        if($condition->toilet === 1){
            $toilet = 'トイレなし';
        }

        if($condition->medicine === 0){
            $medicine = '服用確認';
        }else{
            $medicine = '服用未確認';
        }
        
        return view('admin.condition.show', compact('condition','toilet','medicine','patient'));
        


    }

    public function weightlogShow($id){
    

            //降順で３０日分のデータ取得
           $logs = Condition::where('patient_id', $id)
                     ->select('weight','created_at')
                     ->orderBy('created_at', 'desc')
                     ->take(30)->get();
       
               
           $weights= [];
           $days=[];
       
           foreach($logs as $log) {
               $weight = $log->weight;
               $weights[] = $weight;
               
               $day = $log->created_at;
               $dt = new Carbon($day);
               $test = $dt->toDateString();
               $days[] =$test;
              
           }  
               
               
               //Viewにログデータを渡す
               return view("admin.weightlog.show",compact(
                   'days',
                   'weights'
               ));
           

    }

    function bloodpressureShow($id){
    

        //降順で３０日分のデータ取得
       $logs = Condition::where('patient_id', $id)
                 ->select('high_pressure','low_pressure','created_at')
                 ->orderBy('created_at', 'desc')
                 ->take(30)->get();
   
           
       $high_pressures= [];
       $low_pressures= [];
       $days=[];
   
       foreach($logs as $log) {
           $highe_pressure = $log->high_pressure;
           $high_pressures[] = $highe_pressure;

           $low_pressure = $log->low_pressure;
           $low_pressures[] = $low_pressure;

           
           $day = $log->created_at;
           $dt = new Carbon($day);
           $test = $dt->toDateString();
           $days[] =$test;
          
       }  
           
           
           //Viewにログデータを渡す
           return view("user.bloodpressure.show",compact(
               'days',
               'high_pressures',
               'low_pressures'
           ));
       }


    

    

   
}
