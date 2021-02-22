@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">介護士一覧</div>

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
                        <th scope="col">メールアドレス</th>
                        <th scope="col">担当患者</th>
                        </tr>
                    </thead>
                     @foreach($users as $user)
                    <tbody>
                        <tr>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}} </td>
                        <td><a href="{{ route('admin.patient.index', ['id' => $user->id] )}}">見る
                        </a></td>
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
