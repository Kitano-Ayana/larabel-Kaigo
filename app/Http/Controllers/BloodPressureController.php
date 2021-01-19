<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Patient;
use Carbon\Carbon;


class BloodPressureController extends Controller
{
    function show($id){
    

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
           return view("bloodpressure.show",compact(
               'days',
               'high_pressures',
               'low_pressures'
           ));
       }
}
