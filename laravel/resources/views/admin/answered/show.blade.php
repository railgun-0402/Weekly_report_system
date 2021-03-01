@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')
<div class="container">
    <h4 class="mb-3">回答内容【{{$user->full_name}}】さん</h4>

    @foreach ($questions as $question)

    <div class="row">
        <div class="col-md-8 mb-4">
            <label for="">Q／</label>
            <div>{{$question->question_group}}</div>
            <div>{{$question->form_types_code}}</div>
            <div>{{$question->content}}</div>
            {{-- <div>{{$question->user_code}}</div> --}}
            {{-- <div>{{$question->selectable_item}}</div> --}}
            <div>{{$question->item_content1}}</div>
            <div>{{$question->item_content2}}</div>
            <div>{{$question->item_content3}}</div>
            <div>{{$question->item_content4}}</div>
            <div>{{$question->item_content5}}</div>
        </div>
    </div>
    @endforeach

    @foreach ($answers as $key => $answer)
        <div class="row">
            <div class="col-md-8 mb-4">
                <label for="">Q{{$key+1}}／</label>
                <div>{{$answer->content}}</div>
                <div>{{$answer->content}}</div>
            </div>
        </div>
    @endforeach

    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><a class="btn btn-secondary" onclick="history.back();">戻る</a></div>
    </div>
</div>
@endsection
