<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\User;
use App\Http\Requests\StorePatient;
use App\Services\CheckPatientData;
use Log;




class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        //検索フォーム
        $search = $request->input('search');

        $query = DB::table('patients');
        //もしキーワードがあれば
        if($search !== null) {
            //全角スペースを半角に
            $search_split = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1,PREG_SPLIT_NO_EMPTY);
           
            //単語をループで回す
            foreach($search_split2 as $value){
                $query->where('patient_name','like','%'.$value.'%');
            }
        }
        //
        //$patients = DB::table('patients')
        $query->where('user_id', Auth::id());
        $query->select('id','patient_name', 'age', 'created_at');
        $patients = $query->paginate(20);

        return view('patient.index',compact('patients'));
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patient.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ログファイルに表示させる ddできない時のデバック方法
       // Log::info($request->patients['patient_name']);

        //Patientのインスタンス化
        $patient = new Patient;


        //データの保存
        $patient->user_id = Auth::id();
        $patient->id = $request->input('id');
        $patient->patient_name = $request->input('patient_name');
        $patient->email = $request->input('email');
        $patient->age = $request->input('age');
        $patient->gender = $request->input('gender');


        
        $patient->save();

        return redirect()->route('patient.index');
      


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
        
        $gender = CheckPatientData::checkGender($patient);

          //compactで変数をviewに渡す
          if($patient->user_id == Auth::id()) {
            return view('patient.show' ,compact('patient', 'gender'),);
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
        $patient = Patient::find($id);

        return view('patient.edit', compact('patient'));
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
        $patient = Patient::find($id);

        //データの保存
        $patient->user_id = Auth::id();
        //dd($patient);
        $patient->patient_name = $request->input('patient_name');
        $patient->email = $request->input('email');
        $patient->age = $request->input('age');
        $patient->gender = $request->input('gender');

        $patient->save();


        return redirect()->route('patient.index');


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
       // 

        $patient = Patient::find($id);

        Log::info($patient['id']);

        $patient->delete();


        return redirect()->route('patient.index');
    }

}
