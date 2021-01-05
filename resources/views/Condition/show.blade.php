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

                <div class="card-header">{{ $patient->patient_name}}さんの詳細ページ</div>
                <h5 class="card-title"></h5>
                    <form  method="GET" action="{{ route('patient.store')}}">
                        @csrf
                        名前：{{ $patient->patient_name}}<br>
                        メールアドレス：{{ $patient->email}}<br>
                        年齢：{{ $patient->age}}<br>
                        性別：{{ $gender}}<br>
                        作成日：{{ $patient->created_at}}<br>
                    </form>

                        <form method="GET" action=" {{route('patient.edit',['id' => $patient->id ])}}">
                            @csrf
                            <input class="btn btn-info" type="submit" value="変更する">
                        </form>
                        <form method="POST" action="{{route('patient.destroy',['id' => $patient->id ])}}" id="delete_{{ $patient->id }}">
                            @csrf
                            <a href="#" class="btn btn-danger" date-id="{{ $patient->id }}" onclick="deletePost(this);">削除する</a>
                        </form>
                        <form method="GET" action=" {{route('condition.create',['id' => $patient->id])}}">
                            @csrf
                            <input class="btn btn-info" type="submit" value="記録する">
                        </form>
                        <a href="{{ route('patient.index') }}"><input class="btn btn-info" type="" value="一覧画面に戻る"></a>


              </div>
              <div class="card">
                <div class="card-header">{{ $patient->patient_name}}さんの記録</div>
                    @foreach($conditions as $condition)
                     <tbody>
                      <tr>
                      <td>{{ $condition->created_at }}</td>
                      <td>{{ $condition->comment }}</td><br>
                     </tr>
                     </tbody>
                    @endforeach

            </div>
        </div>

     </div>
</div>

</div>
<script>
function deletePost(e) {
     'use strict';
     if(confirm('本当に削除していいですか？')){
         document.getElementById('delete_' + e.dateder.id).subemit();
     }
}

</script>
@endsection
