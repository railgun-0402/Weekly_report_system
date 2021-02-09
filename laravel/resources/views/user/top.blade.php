@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">メニュー</div>
            <ul>
                <li><a href="{{ url('/user/account/index') }}">アカウント情報</a></li>
                <li><a href="{{ url('/user/enquete/list') }}">アンケート回答</a></li>
            </ul>
        </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
