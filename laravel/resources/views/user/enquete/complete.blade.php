@extends('layouts.app')
@section('content')
<style>
    .complete{
        text-align:center;
        margin-top:300px
    }

    .comh2{
        font-size:25pt;        
    }
    .linkcom{        
        font-size:15pt
    }

    .container{
        
    }

</style>    
<div class="container">
    <div class="complete">
        <h2 class="comh2">
        お疲れさまでした<br>
        回答が完了しました</h2><br><br>
        <a class="linkcom" href="{{ url('/user/top') }}">トップに戻る</a>
    </div>    
</div>
@endsection