<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Patient;



class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('condition.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $patient_id = $id;
      return view('condition.create', ['patient_id' => $patient_id] );
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Conditionのインスタンス化
        $condition = new Condition;

        

        //データの保存
        $condition->comment = $request->input('comment');
        $patient_id = $request->input('patient_id');
        $condition->patient_id = $patient_id;
        $condition->save();



        return redirect()->route('condition.show', 
                   ['id' => $patient_id ]  );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = Patient::find($id);
        $conditions=Condition::where('patient_id', $id)->get();

        if($patient->gender === 0){
            $gender = '男性';
        } 
        if($patient->gender ===1){
            $gender = '女性';
        }

        return view('condition.show', 
                     ['patient_id' => $id,'patient' => $patient,'conditions' => $conditions]);

        
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
