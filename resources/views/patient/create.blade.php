@extends('layouts.app')

@section('content')
<div class="container">
<div class="card" style="width: 35rem;">
  <div class="card-body">
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

    <h5 class="card-title">新規登録</h5>
    <form  method="POST" action="{{ route('patient.store')}}">
        @csrf
        患者さんの名前
        <input class="patient_name" type="text" name="patient_name"/>
        <br>
        メールアドレス
        <input class="patient_mail" type="text" name="email"/>
        <br>
        年齢
        <input class="patinet_age" type="text" name="age"/>
        <br>
        性別
        <input type="radio" name="gender" value="0">男性</input>
        <input type="radio" name="gender" value="1">女性</input>
        <br>
        <input class="btn btn-info" type="submit" value="登録する">
    </form>
  </div>
</div>

</div>
@endsection
