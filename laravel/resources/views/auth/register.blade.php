@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('アカウント新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- 氏名 --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏　名') }}</label>
                            <div class="col-md-6">
                                <input maxlength="30" id="name" type="text" placeholder="山田 太郎" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 社員コード --}}
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('社員コード') }}</label>
                            <div class="col-md-6">
                                <input maxlength="3" id="code" type="text" placeholder="001" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="off">
                            </div>
                        </div>

                        {{-- システムを扱う権限 --}}
                        <div class="form-group row">
                            <label for="role_code" class="col-md-4 col-form-label text-md-right">{{ __('システムを扱う権限') }}</label>
                            <div class="col-md-6">
                                <select id="role_code" name="role_code" class="form-control" required>
                                    <option value="">選択してください</option>
                                    <option value="ORDINARY" selected>一般社員</option>
                                    <option value="ADMIN">管理者</option>
                                </select>
                            </div>
                        </div>

                        {{-- ログインID（メアド） --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメール') }}</label>
                            <div class="col-md-6">
                                <input maxlength="64" id="email" type="email" placeholder="yamada@barnet.co.jp" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                            <div class="col-md-6">
                                <input maxlength="16" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード（確認） --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認）') }}</label>
                            <div class="col-md-6">
                                <input maxlength="16" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="mx-2 btn btn-secondary" onclick="history.back();">{{ __('戻る') }}</a>
                                <button type="submit" class="mx-2 btn btn-primary">{{ __('登録') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
