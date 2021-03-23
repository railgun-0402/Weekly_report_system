@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">ユーザーTop画面</div>
            @if ($next_answer_date != '' and new DateTime($next_answer_date) > new DateTime($today))
            <div class="text-danger" style="font-size:18px;">～次回の回答日は{{$next_answer_date}}頃にお願い致します～</div>
            @endif

            @if (new DateTime($next_answer_date) < new DateTime($today))
            <div class="text-danger" style="font-size:18px;">前回の回答から一週間が既に経過していますので、<br>お早めにご回答をお願い致します。</div>
            @endif
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
