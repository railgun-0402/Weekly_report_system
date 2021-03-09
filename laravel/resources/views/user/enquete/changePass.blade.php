@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">パスワード変更画面</div>
        </div>

        {{-- エラーメッセージ --}}
        @if(count($errors) > 0)
        <div class="container mt-2">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
        @endif

        {{-- 更新成功メッセージ --}}
        @if (session('update_password_success'))
        <div class="container mt-2">
            <div class="alert alert-success">
                {{session('update_password_success')}}
            </div>
        </div>
        @endif
        
        <div class="card-body">
            <form method="POST", action="{{ action('UserController@updatePassword') }}">
                @csrf
                <div class="form-group">
                    <label for="current">現在のパスワード</label>
                    <div>
                        <input maxlength="16" id="current" type="password" class="form-control" name="current-password" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">新しいパスワード</label>
                    <div>
                        <input maxlength="16" id="password" type="password" class="form-control" name="new-password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm">新しいパスワード (確認用)</label>
                    <div>
                        <input maxlength="16" id="confirm" type="password" class="form-control" name="new-password_confirmation" required>
                    </div>
                </div>

                <div>
                    <a class="btn btn-secondary mr-1" href="{{ url($role_check) }}">戻る</a>

                    <button type="submit" class="btn btn-primary">変更</button>
                </div>
        </form>
    </div>

        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
