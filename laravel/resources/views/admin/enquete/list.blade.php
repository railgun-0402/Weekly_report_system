@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/top') }}">戻る</a></div>
                <div class="ml-auto p-2 bd-highlight"><a href="{{ url('/admin/enquete/create') }}">アンケート新規作成</a></div>
            </div>
            <div class="mb-3">出題（予定）アンケート一覧</div>
            <table class="table table-sm">
                <tr>
                    <th scope="col">更新日</th>
                    <th scope="col">アンケート内容（質問のかたまり）</th>
                </tr>

                @foreach ($questions as $key => $question)
                <tr>
                    <td>{{$question->question_group}}</td>
                    <td><a href="/admin/enquete/show/{{$question->question_group}}">アンケート{{$key+1}}</a></td>
                </tr>
                @endforeach

            </table>
        </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
