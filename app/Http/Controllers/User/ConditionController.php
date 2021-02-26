<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Patient;
use App\Http\Requests\StoreCondition;
use App\Services\CheckPatientData;
use App\Services\CheckConditionData;








class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$conditions情報を日付の新しい順番に表示       
        $conditions = Condition::where('patient_id', $id)
                      ->orderBy('created_at', 'desc')
                      ->get();

        $condition = Condition::find($id);
        $patient = Patient::find($id);
        

        //$gender情報を数字から文字に変換
        $gender = CheckPatientData::checkGender($patient);

        return view('user.condition.index', 
        [
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
      return view('user.condition.create', ['patient_id' => $patient_id]
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



        return redirect()->route('user.condition.index', ['id' => $patient_id ]  );

    }

    /**
     * Display the specified resource.F
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$condition->idが一致している＄condition情報の取得
        $condition = Condition::find($id);


        $patient_id = $condition->patient_id;
        $patient = Patient::find($patient_id);
    
        //トイレ項目０の時はトイレあり、トイレ項目1の時はトイレなしと表示
        if($condition->toilet === 0){
            $toilet = 'トイレあり';
          }
          if($condition->toilet === 1){
              $toilet = 'トイレなし';
          }


          //服用確認0の時は服用確認と表示する
          if($condition->medicine === 0){
            $medicine = '服用確認';
        }
         
        return view('user.condition.show', compact('condition','toilet','medicine','patient'));
        

        
    }

}
