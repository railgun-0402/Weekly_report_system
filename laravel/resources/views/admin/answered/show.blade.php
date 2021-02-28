@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')

<div class="container">
    <h4 class="mb-3">回答内容</h4>

    @for ($i=1; $i<=7; $i++)
        <div class="row">
            <div class="col-md-8 mb-4">
                <label for="">Q{{$i}} ○○？</label>
                <div>A{{$i}} Et vel est blanditiis eum est praesentium quidem adipisci.Et vel est blanditiis eum est praesentium quidem adipisci.Et vel est blanditiis eum est praesentium quidem adipisci.Et vel est blanditiis eum est praesentium quidem adipisci.</div>
            </div>
        </div>
    @endfor

    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><a class="btn btn-secondary" onclick="history.back();">戻る</a></div>
    </div>
</div>
@endsection
