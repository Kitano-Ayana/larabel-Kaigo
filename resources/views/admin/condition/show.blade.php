@extends('layouts.admin.app')

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
                    <form  method="GET" action="{{ route('user.patient.store')}}">
                        @csrf
                        名前：{{ $patient->patient_name}}<br>
                        メールアドレス：{{ $patient->email}}<br>
                        年齢：{{ $patient->age}}<br>
                        性別：{{ $patient->gender}}<br>
                        作成日：{{ $patient->created_at}}<br>
                    </form>

                        <a href="{{ route('admin.patient.index',['id' => $patient->id]) }}"><input class="btn btn-info" type="" value="一覧画面に戻る"></a>

              </div>
        </div>

     </div>
</div>

</div>
@endsection
