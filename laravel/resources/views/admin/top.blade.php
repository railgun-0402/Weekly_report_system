@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">管理者メニュー</div>
            <ul>
                <li><a href="{{url('/admin/enquete/questionList')}}">配信するアンケートを登録</a></li>
                <li><a href="{{url('/admin/account/list')}}">登録アカウント一覧を操作</a></li>
                <li><a href="{{url('/admin/answered/list')}}">回答アンケートを参照</a></li>
                <li><a href="{{ url('/user/enquete/changePass') }}">パスワードを変更する</a></li>
            </ul>
        </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
