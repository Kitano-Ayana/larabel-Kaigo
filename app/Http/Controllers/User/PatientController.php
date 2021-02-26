<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Condition;
use App\Models\User;
use App\Http\Requests\StorePatient;
use App\Services\CheckPatientData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;





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
        //キーワードがあればある場合
        if($search !== null) {

            //全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1,PREG_SPLIT_NO_EMPTY);
           
            //単語をループで回す
            foreach($search_split2 as $value){
                $query->where('patient_name','like','%'.$value.'%');
            }
        }
                
        //1ページ15件の患者情報を表示
        $query->where('user_id', Auth::id());
        $query->select('id','patient_name', 'age', 'created_at');
        $patients = $query->paginate(15);
      

        return view('user.patient.index',compact('patients'));
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.patient.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        //患者一覧画面に移動
        return redirect()->route('user.patient.index');
      


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
            return view('user.patient.show' ,compact('patient', 'gender'),);
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
       
        $patient = Patient::find($id);

        return view('user.patient.edit', compact('patient'));
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
        
        $patient = Patient::find($id);

        //データの保存
        $patient->user_id = Auth::id();
        $patient->patient_name = $request->input('patient_name');
        $patient->email = $request->input('email');
        $patient->age = $request->input('age');
        $patient->gender = $request->input('gender');

        $patient->save();

        //患者一覧画面に移動
        return redirect()->route('user.patient.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 

        $patient = Patient::find($id);


        $patient->delete();

        //削除後、患者一覧画面に移動
        return redirect()->route('user.patient.index');
    }

}
