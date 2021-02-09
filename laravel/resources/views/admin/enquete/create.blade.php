@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('アンケート新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        {{-- questionsテーブルのカラム
                        id, question_group, form_types_code, user_code, selectable_item,
                        item_content1, item_content2, item_content3, item_content4, item_content5,
                        content, created_at, updated_at, deleted_at --}}

                        {{-- ・質問する文章を入力してください。 --}}
                        <div class="form-group">
                            <label for="content" class="">{{ __('質問する文章を入力してください。') }}</label>
                            <div class="col-md-12">
                                <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" required autocomplete="off" autofocus>{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">質問する文章を入力してください。</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div> --}}






                        {{-- ・どの形式で回答してもらうか選択してください。
                        ・回答してもらう、選択肢の内容を入力してください。 --}}







                        {{-- ログインID入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ログインID') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- 社員コード入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('社員コード') }}</label>
                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('phone') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="off">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- 登録ユーザーの種別入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="role_code" class="col-md-4 col-form-label text-md-right">{{ __('登録ユーザーの種別') }}</label>
                            <div class="col-md-6">
                                <select id="role_code" name="role_code" class="form-control" required>
                                    <option value="">選択してください</option>
                                    <option value="ORDINARY">一般の従業員</option>
                                    <option value="ADMIN">管理者</option>
                                </select>
                            </div>
                        </div> --}}

                        {{-- E-Mail アドレス入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail アドレス') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- 氏　名入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('氏　名') }}</label>
                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control @error('phone') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="off">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- パスワード入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- パスワード（確認）入力欄 --}}
                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認）') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新規登録') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
