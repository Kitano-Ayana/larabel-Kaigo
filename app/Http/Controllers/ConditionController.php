<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Patient;
use App\Http\Requests\StoreCondition;
use App\Services\CheckPatientData;






class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
                
        $conditions = Condition::where('patient_id', $id)
                      ->orderBy('created_at', 'desc')
                      ->get();

        $condition = Condition::find($id);
        $patient = Patient::find($id);

        $gender = CheckPatientData::checkGender($patient);

        return view('condition.index', 
        [
         //'patient_id' => $id,
         'patient' => $patient,
         'conditions' => $conditions,
         'condition' => $condition,
         'gender' => $gender
         ]);

         


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $patient_id = $id;
      return view('condition.create', ['patient_id' => $patient_id]
     );
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCondition $request)
    {
        //Conditionのインスタンス化
        $condition = new Condition;

        

        //データの保存
        $condition->comment = $request->input('comment');
        $patient_id = $request->input('patient_id');
        $condition->patient_id = $patient_id;
        $condition->weight = $request->input('weight');
        $condition->high_pressure = $request->input('high_pressure');
        $condition->low_pressure = $request->input('low_pressure');
        $condition->toilet = $request->input('toilet');
        $condition->medicine = $request->input('medicine');
        $condition->save();



        return redirect()->route('condition.index', ['id' => $patient_id ]  );

    }

    /**
     * Display the specified resource.F
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        
        if($condition->patient_id == $patient->id) {
        return view('condition.show', compact('condition','toilet','medicine','patient'));
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
