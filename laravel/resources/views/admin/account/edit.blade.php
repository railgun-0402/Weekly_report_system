@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント情報編集</div>
                <div class="card-body">
                    <form method="POST" action="/admin/account/edit/{{ $user->id }}">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <div><input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="code">code</label>
                            <div><input id="code" type="text" name="code" class="form-control" value="{{ $user->code }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="role_code">role_code</label>
                            <div><input id="role_code" type="text" name="role_code" class="form-control" value="{{ $user->role_code }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div><input id="email" type="text" name="email" class="form-control" value="{{ $user->email }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="full_name">full_name</label>
                            <div><input id="full_name" type="text" name="full_name" class="form-control" value="{{ $user->full_name }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="created_at">created_at</label>
                            <div><input id="created_at" type="text" name="created_at" class="form-control" value="{{ $user->created_at }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="updated_at">updated_at</label>
                            <div><input id="updated_at" type="text" name="updated_at" class="form-control" value="{{ $user->updated_at }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="deleted_at">deleted_at</label>
                            <div><input id="deleted_at" type="text" name="deleted_at" class="form-control" value="{{ $user->deleted_at }}"></div>
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
