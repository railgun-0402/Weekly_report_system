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
                            <label for="full_name" class="col-sm-2 col-form-label">氏名（フルネーム）</label>
                            <div class="col-sm-10"><input id="full_name" type="text" name="full_name" class="form-control" value="{{$user->full_name}}"></div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">ログインID</label>
                            <div class="col-sm-10"><input id="name" type="text" name="name" class="form-control" value="{{$user->name}}"></div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">社員コード</label>
                            <div class="col-sm-10"><input id="code" type="text" name="code" class="form-control" value="{{$user->code}}"></div>
                        </div>

                        <div class="form-group row">
                            <label for="role_code" class="col-sm-2 col-form-label">登録ユーザーの種別</label>
                            <div class="col-sm-10"><input id="role_code" type="text" name="role_code" class="form-control" value="{{$user->role_code}}"></div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-Mail アドレス</label>
                            <div class="col-sm-10"><input id="email" type="text" name="email" class="form-control" value="{{$user->email}}"></div>
                        </div>


                        {{-- <div class="form-group row">
                            <label for="created_at" class="col-sm-2 col-form-label">created_at</label>
                            <div class="col-sm-10"><input id="created_at" type="text" name="created_at" class="form-control" value="{{$user->created_at}}"></div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="updated_at" class="col-sm-2 col-form-label">updated_at</label>
                            <div class="col-sm-10"><input id="updated_at" type="text" name="updated_at" class="form-control" value="{{$user->updated_at}}"></div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="deleted_at" class="col-sm-2 col-form-label">deleted_at</label>
                            <div class="col-sm-10"><input id="deleted_at" type="text" name="deleted_at" class="form-control" value="{{$user->deleted_at}}"></div>
                        </div> --}}

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
