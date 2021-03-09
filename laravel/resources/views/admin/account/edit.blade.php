@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">アカウント情報編集</div>
                <div class="card-body">
                    <form method="POST" action="/admin/account/edit/{{ $user->id }}">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">氏　名</label>
                            <div class="col-sm-10"><input maxlength="30" id="name" type="text" name="name" class="form-control" value="{{$user->name}}"></div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">社員コード</label>
                            <div class="col-sm-10"><input maxlength="3" id="code" type="text" name="code" class="form-control" value="{{$user->code}}"></div>
                        </div>

                        <div class="form-group row">
                            <label for="role_code" class="col-sm-2 col-form-label">システムを扱う権限</label>
                            <div class="col-sm-10">
                                <select id="role_code" name="role_code" class="form-control" required>
                                    <option value="">選択してください</option>
                                    <option value="ORDINARY"<?php if ($user->role_code === 'ORDINARY') { echo ' selected'; }?>>一般社員</option>
                                    <option value="ADMIN"<?php if ($user->role_code === 'ADMIN') { echo ' selected'; }?>>管理者</option>
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Eメール</label>
                            <div class="col-sm-10"><input maxlength="64" id="email" type="email" name="email" class="form-control" value="{{$user->email}}"></div>
                        </div>

                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="{{url('/admin/account/list')}}" class="btn btn-secondary mx-3">戻る</a>
                                <input type="submit" class="btn btn-success mx-3" value="更新">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
