@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">患者一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">名前</th>
                        <th scope="col">患者情報</th>
                        <th scope="col">記録を見る</th>
                        </tr>
                    </thead>
                     @foreach($patients as $patient)
                    <tbody>
                        <tr>
                        <td>{{ $patient->patient_name}}</td>
                        <td><a href="{{ route('admin.patient.show', ['id' => $patient->id] )}}">見る</a></td>
                        <td><a href="{{ route('admin.condition.index', ['id' => $patient->id] )}}">見る</a></td>
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
