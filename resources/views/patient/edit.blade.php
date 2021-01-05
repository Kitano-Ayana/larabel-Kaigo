@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
            @endif

                <div class="card-header">{{ $patient->patient_name }}さんの詳細ページ</div>

                <h5 class="card-title"></h5>
                    <form  method="POST" action="{{ route('patient.update', ['id' => $patient->id ])}}">
                        @csrf
                        患者さんの名前
                        <input type="text" name="patient_name" value="{{ $patient->patient_name}}">
                        <br>
                        メールアドレス
                        <input type="text" name="email" value="{{ $patient->email}}">
                        <br>
                        年齢
                        <input type="text" name="age" value="{{ $patient->age}}">
                        <br>
                        性別
                        <input type="radio" name="gender" value="0" @if($patient->gender ===0)  checked @endif>男性</input>
                        <input type="radio" name="gender" value="1" @if($patient->gender ===1)  checked @endif>女性</input>
                        <br>
                        <input class="btn btn-info" type="submit" value="変更する">

                    </form>
            
              </div>
        </div>
     </div>
</div>

</div>
@endsection
