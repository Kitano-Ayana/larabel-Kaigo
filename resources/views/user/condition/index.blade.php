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
                    <form  method="GET" action="{{ route('user.patient.store')}}">
                        @csrf
                        名前：{{ $patient->patient_name}}<br>
                        メールアドレス：{{ $patient->email}}<br>
                        年齢：{{ $patient->age }}<br>
                        性別：{{ $gender}}<br>
                        作成日：{{ $patient->created_at}}<br>
                    </form>

            </div>
              <div class="card">
                <div class="card-header">{{ $patient->patient_name}}さんの記録</div>
                    <table class="table">
                    <div class="log">
                    <p>過去の記録</p>
                    <a href="{{ route('user.weightlog.show', ['id' => $patient->id]) }} ">体重</a>
                    <a href="{{ route('user.bloodpressure.show', ['id' => $patient->id]) }} ">血圧</a>
                    </div>
                    <thead>
                        <tr>
                        <th scope="col">作成日</th>
                        <th scope="col">コメント</th>
                        <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    @foreach($conditions as $condition)

                     <tbody>
                      <tr>
                       <td>{{ $condition->created_at }}</td>
                       <td>{{ $condition->comment }}</td>
                       <td><a href="{{ route('user.condition.show',['id' => $condition->id]) }}">詳細を見る</a></td>
                     </tr>
                     </tbody>
                    @endforeach
                    </table>
              </div>
            </div>
        </div>

     </div>
</div>
</div>
<script>
function deletePost(e) {
     'use strict';
     if(confirm('本当に削除していいですか？')){
         document.getElementById('delete_' + e.dataset.id).submit();
     }
}

</script>


@endsection
