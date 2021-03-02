@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')

<div class="container">
    <h4 class="mb-3">回答内容</h4>

    @for ($i=0;$i < count($questions);$i++)
        @php             
            $que = array_slice($questionsArray,$i, 1);
            $question = array_shift($que);
            $questionArr = (array)$question;            
            $questionContent = $questionArr['content'];

            $ans = array_slice($answersArray, $i, 1);
            $answer = array_shift($ans);            
            $answerContent = $answer['content'];
        @endphp
        <div class="row">
            <div class="col-md-8 mb-4">
                <label for="">Q{{$i+1}} {{$questionContent}}？</label>
                <div>A{{$i+1}} {{$answerContent}}</div>
            </div>
        </div>
    @endfor

    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><a class="btn btn-secondary" onclick="history.back();">戻る</a></div>
    </div>
</div>
@endsection