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
    <h5 class="card-title">記録をつける</h5>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">患者さんの状態</label>
          <form  method="POST" action="{{ route('condition.store', ['id' => $patient_id ] )}}">
          @csrf
            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
          <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
          <input class="btn btn-info" type="submit" value="登録する">
          </form>
        </div>
  </div> 
</div>
</div>
@endsection
