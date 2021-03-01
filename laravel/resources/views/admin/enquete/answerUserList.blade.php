@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class="col-sm-12">
            
            <div class="mb-3">回答者リスト一覧</div>
                <table class="table table-sm">
                    <tr>
                        <th scope="col">回答日</th>
                        <th scope="col">氏名</th>
                    </tr>                    

                    @foreach ($users as $key => $user)
                        <tr>
                            <td>20XX年XX月XX日</td>
                            <td><a href="{{ url('/admin/enquete/answerList/answerUserList', $user->id) }}">{{ $user->name }}</a></td>
                            <input type="hidden" name="form_{{ $user->id }}" value="{{ $user->name }}">
                        </tr>
                    @endforeach
                </table>                

                <div class="d-flex bd-highlight mb-3">
                    <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/enquete/answerList') }}">戻る</a></div>            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection