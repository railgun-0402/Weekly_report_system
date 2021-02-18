@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('アンケート編集') }}</div>
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">出題する質問</th>
                                    <th scope="col">回答させる形式</th>
                                    <th scope="col">ラジオボタンで回答者が選ぶ選択肢</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($questions as $question)
                            <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" rows="2">{{$question->content}}</textarea>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($form_types as $key => $form_type)
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" name="form_types_code" id="q{{$key+1}}" value="{{$form_type->code}}" <?php if ($question->form_types_code == $form_type->code) { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="q{{$key+1}}">{{$form_type->name}}</label>
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content1" class="form-control form-control-sm not_radio" placeholder="例）大変良好" value="{{$question->item_content1}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content2" class="form-control form-control-sm not_radio" placeholder="例）良好" value="{{$question->item_content2}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content3" class="form-control form-control-sm not_radio" placeholder="例）どちらともいえない" value="{{$question->item_content3}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content4" class="form-control form-control-sm not_radio" placeholder="例）悪い" value="{{$question->item_content4}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content5" class="form-control form-control-sm not_radio" placeholder="例）非常に悪い" value="{{$question->item_content5}}"></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="/admin/enquete/list" class="btn btn-secondary mx-3">戻る</a>
                                <input type="submit" class="btn btn-primary mx-3" value="更新">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
