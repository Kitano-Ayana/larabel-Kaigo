@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">さんの担当患者</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('patient.create') }}"><input class="btn btn-info" type="" value="新規登録"></a>

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">名前</th>
                        <th scope="col">年齢</th>
                        <th scope="col">登録日</th>
                        <th scope="col">詳細</th>
                        </tr>
                    </thead>
                     @foreach($patients as $patient)
                    <tbody>
                        <tr>
                        <td>{{ $patient->patient_name}}</td>
                        <td>{{ $patient->age}} </td>
                        <td>{{ $patient->created_at}}</td>
                        </tr>
                    </tbody>
                     @endforeach 
                     </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
