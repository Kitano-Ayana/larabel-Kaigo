@extends('layouts.user.app')

@section('content')
<div class="container">
<div class="card" style="width: 35rem;">
  <div class="card-body">
  @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
   @endif

   @if ($errors->any())
   <div class="alert alert-danger">
    <ul>
     @foreach ($errors->all() as $error)
       <li>{{ ($error) }}</li>
     @endforeach
     </ul>
   </div>
   @endif
    <h5 class="card-title">記録をつける</h5>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">今日の様子</label>
          <form  method="POST" action="{{ route('user.condition.store', ['id' => $patient_id ] )}}">
          @csrf
            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
          <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
          体重
            <input type="text" name="weight"/>kg
            <br>
          血圧 <br>
          収縮期
            <input type="text" name="high_pressure"/>mmHg<br>
          拡張期
          <input type="text" name="low_pressure"/>mmHg
          <br>
          トイレ
          <input type="radio" name="toilet" value="0">あり</input>
          <input type="radio" name="toilet" value="1">なし</input>
            <br>
          薬
          <input type="radio" name="medicine" value="0">服用確認</input>
            <br>

          <input class="btn btn-info" type="submit" value="登録する">
          </form>
          <a href="{{ route('user.patient.index') }}"><input class="btn btn-info" type="" value="一覧画面に戻る"></a>
        </div>
  </div> 
</div>
</div>
@endsection
