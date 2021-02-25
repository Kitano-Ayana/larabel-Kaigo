@extends('layouts.user.app')

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
                    <form  method="GET" action="{{ route('user.condition.store')}}">
                        @csrf
                        作成日：{{ $condition->created_at}}<br>
                        コメント：{{ $condition->comment}}<br>
                        体重：{{ $condition->weight }}Kg<br>
                        血圧　収縮期：{{ $condition->high_pressure}}mmHg<br>
                        血圧　拡張期：{{ $condition->low_pressure}}mmHg<br>
                        トイレ：{{ $toilet}}<br>
                        薬の服用：{{ $medicine}}
                    </form>

                        
                    <a href="{{ route('user.patient.index') }}"><input class="btn btn-info" type="" value="一覧画面に戻る"></a>

              </div>
        </div>

     </div>
</div>

</div>

@endsection
