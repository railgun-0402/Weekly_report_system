@extends('layouts.app')

@section('content')

<div class='container'>

    <div class='row'>
        <div class="col-sm-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/top') }}">戻る</a></div>            
            </div>
            <div class="mb-3">回答済みアンケート参照</div>
                <table class="table table-sm">
                    <tr>
                        <th scope="col">実施日</th>
                        <th scope="col">タイトル</th>
                    </tr>

                    @foreach ($questions as $key => $question)
                        <tr>
                            <td>20XX年XX月XX日</td>
                            <td><a href="{{ url('/admin/enquete/answerList/answerUserList') }}">アンケート {{ $question->question_group }}</a></td>
                        </tr>
                    @endforeach
                </table>                
    </div>
</div>

@endsection