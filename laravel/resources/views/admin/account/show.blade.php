@extends('layouts.app')
@section('title', $user->full_name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント情報</div>
                <div class="card-body">
                    <form method="POST" action="{{ action('UserController@accountUpdate') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">ユーザー名</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" name="name" class="form-control-plaintext" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">コード</label>
                            <div class="col-sm-10">
                                <input id="code" type="text" name="code" class="form-control-plaintext" value="{{ $user->code }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="full_name" class="col-sm-2 col-form-label">氏　名</label>
                            <div class="col-sm-10">
                                <input id="full_name" type="text" name="full_name" class="form-control-plaintext" value="{{ $user->full_name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="created_at" class="col-sm-2 col-form-label">作成日</label>
                            <div class="col-sm-10">
                                <input id="created_at" type="text" name="created_at" class="form-control-plaintext" value="{{ $user->created_at }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="updated_at" class="col-sm-2 col-form-label">更新日</label>
                            <div class="col-sm-10">
                                <input id="updated_at" type="text" name="updated_at" class="form-control-plaintext" value="{{ $user->updated_at }}">
                            </div>
                        </div>

                        <a class="btn btn-secondary" href="{{ url('/admin/account/list') }}">戻る</a>
                        <button type="submit" class="btn btn-success">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
