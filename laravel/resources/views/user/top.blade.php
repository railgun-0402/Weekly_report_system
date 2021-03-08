@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">ユーザーTop画面</div>
                <ul>
                    <li><a href="{{ url('/user/enquete/index') }}">アンケートに回答する</a></li>
                    <li><a href="{{ url('/user/enquete/changePass') }}">パスワードを変更する</a></li>
                </ul>
            </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
