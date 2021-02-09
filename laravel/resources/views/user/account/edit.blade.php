@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント情報編集</div>
                <div class="card-body">
                    <form method="POST" action="{{ action('UserController@accountUpdate') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <div><input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div><input id="email" type="text" name="email" class="form-control" value="{{ $user->email }}"></div>
                        </div>
                        <a class="btn btn-secondary" href="/user/account/index">戻る</a>
                        <button type="submit" class="btn btn-success">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
