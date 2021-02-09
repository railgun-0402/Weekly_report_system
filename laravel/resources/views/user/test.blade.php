@extends('layouts.app')
@section('content')
<div class="container">
    <form action="#" method="" class="row">
        <div class="kakuninn">
            <h4 class="mb">回答確認画面</h4><br>
            <h5 class="mb2">回答内容をご確認ください。</h5>

            <a class="hoge" href="{{ url('/user/enquete/list') }}">戻る</a>
            <button type="submit" class="btn btn-success">確認</button>
        
        
        </div>
    </form>
</div>
@endsection