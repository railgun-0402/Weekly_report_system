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

                        {{-- 社員コード入力欄 --}}
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('社員コード') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <input id="code" type="text" placeholder="001" class="form-control @error('phone') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="off">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 氏　名 入力欄 --}}
                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('氏名（フルネーム）') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <input id="full_name" type="text" placeholder="鈴木 一郎" class="form-control @error('phone') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="off">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ログインID入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ログインID') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- E-Mail アドレス入力欄 --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail アドレス') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="suzuki@barnet.co.jp" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 登録ユーザーの種別入力欄 --}}
                        <div class="form-group row">
                            <label for="role_code" class="col-md-4 col-form-label text-md-right">{{ __('付与する権限') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <select id="role_code" name="role_code" class="form-control" required>
                                    <option value="">選択してください</option>
                                    <option selected value="ORDINARY">一般ユーザー</option>
                                    <option value="ADMIN">当システムの管理者</option>
                                </select>
                            </div>
                        </div>

                        {{-- パスワード入力欄 --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('初期パスワード') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード（確認）入力欄 --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('初期パスワード（確認）') }}<span class="badge badge-danger mx-1">必須</span></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- 戻る／新規登録ボタン --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/admin/top" class="btn btn-secondary mx-3">戻る</a>
                                <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
