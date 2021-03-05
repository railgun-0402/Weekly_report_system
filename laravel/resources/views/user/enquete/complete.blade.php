<?php

// 次回アンケート日（現在時刻プラス７の日付）
$next_time = date('n/j', strtotime('+7 day'));

?>
@extends('layouts.app')
@section('content')
<style>
    .complete{
        text-align:center;
        margin-top:300px;
    }
    .comh2{ font-size:25pt; }
    .linkcom{ font-size:15pt; }
    .container{}

</style>
<div class="container">
    <div class="complete">
        <h2 class="comh2">
        お疲れさまでした<br>
        回答が完了しました</h2><br><br>
        <p class="comh2">次回は、{{$next_time}}頃に回答お願いします。</p>
        <a class="linkcom" href="{{ url('/user/top') }}">トップに戻る</a>
    </div>
</div>
@endsection
