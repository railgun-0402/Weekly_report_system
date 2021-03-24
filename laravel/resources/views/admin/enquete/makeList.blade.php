@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
            @if(Session('complete_message'))
                $(function(){
                    toastr.success('{{ session('complete_message') }}')
                });
            @endif
            </script>
            
            <div class="card">
                <div class="card-header">{{ __('作成済アンケート一覧画面') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{url('AdminController@enqueteUpdate')}}">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="question_group" value="{{$now}}">
                        <p class="font-weight-bold text-danger">{{$makeDate}}に作成したアンケート一覧になります。</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">出題する質問</th>
                                    <th scope="col">回答させる形式</th>
                                    <th scope="col">選択肢</th>
                                    <th scope="col">編集する</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $questionNo = 1; @endphp
                            @foreach ($questions as $key => $question)                                                        
                            @if ($question->question_group == $makeDate)
                            <tr>
                                <td scope="row">{{$questionNo}}</td>
                                <td>
                                    <div class="form-group">
                                        {{$question->content}}
                                    </div>
                                   
                                </td>
                                <td>
                                <div class="form-group">
                                    @if ($question->form_types_code == '1')
                                        テキストボックス
                                    @elseif ($question->form_types_code == '2')
                                        ラジオボタン
                                    @elseif ($question->form_types_code == '3')
                                        チェックボックス
                                    @elseif ($question->form_types_code == '4')
                                        ドロップダウン
                                    @endif
                                </div>
                                </td>

                                <td>                         
                                    @if ($question->form_types_code == '1')
                                    <div class="form-group">
                                        なし
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        {{$question->item_content1}}
                                    </div>

                                    <div class="form-group">
                                        {{$question->item_content2}}
                                    </div>

                                    <div class="form-group">
                                        {{$question->item_content3}}
                                    </div>

                                    <div class="form-group">
                                        {{$question->item_content4}}
                                    </div>

                                    <div class="form-group">
                                        {{$question->item_content5}}
                                    </div>
                                </td>
                                <td>
                                    <a href='/admin/enquete/editQuestion/{{$makeDate}}/{{$question->id}} ' type="button" class="btn btn-info mr-1">編集</a>
                                </td>
                            </tr>
                            @php $questionNo = $questionNo + 1; @endphp
                            @endif
                            @endforeach

                            </tbody>
                        </table>
                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="/admin/enquete/questionList" class="btn btn-secondary mx-3">戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
