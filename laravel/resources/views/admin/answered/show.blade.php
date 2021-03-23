@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')

<div class="container">
    <h4 class="mb-3">回答内容</h4>

    @for ($i=0;$i < count($questions);$i++)
        @php
            $que = array_slice($resultQuestionArray,$i, 1);
            $questionContent = array_shift($que);            

            $ans = array_slice($resultAnswerArray, $i, 1);
            $answerContent = array_shift($ans);            
        @endphp
        <div class="row">
            <div class="col-md-8 mb-2">
                <dl>
                    <dt class="mb-3">質問{{$i+1}}／<span class="q_info">{{$questionContent}}</span></dt>
                    <dd>回答{{$i+1}}／<span class="a_info">{{$answerContent}}</span></dd>
                </dl>
            </div>
        </div>
    @endfor

    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><a class="btn btn-secondary" onclick="history.back();">戻る</a></div>
    </div>
</div>
@endsection
