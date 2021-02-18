@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">ユーザーTop画面</div>
            <a href="{{ url('/user/enquete/index') }}">アンケートに回答する</a>
        </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
