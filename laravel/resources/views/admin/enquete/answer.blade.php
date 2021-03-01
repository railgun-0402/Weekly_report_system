@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='row'>
        <div class="col-sm-12">
        <div class="mb-3">{{ $user->name }} さん</div>
            <div class="mb-3">アンケート回答内容確認</div>
                <table class="table table-sm">
                    <tr>
                        <th scope="col">回答一覧</th>                        
                    </tr>                    

                    @foreach ($questions as $key => $question)
                        <tr>                            
                            <td>Q{{ $key + 1 }}.{{ $question->content }}</a></td>
                        </tr>
                        <tr>
                            <td> →回答内容見本 {{ $key + 1 }}</td>
                        </tr>
                        
                    @endforeach
                </table>                

                <div class="d-flex bd-highlight mb-3">
                    <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/enquete/answerList/answerUserList') }}">戻る</a></div>    
                    <div class="ml-auto p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/top') }}">Topへ戻る</a></div>        
                </div>
            </div>
        </div>
    </div>

</div>
@endsection