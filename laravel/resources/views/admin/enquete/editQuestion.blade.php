@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">                    
            <div class="card">
                <div class="card-header">{{ __('アンケート編集画面') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{action('AdminController@editQuestionDo')}}">
                        <p class="font-weight-bold text-danger">「出題する質問／回答していただく形式／回答していただく選択肢」をそれぞれ編集してください。</p>
                        <table class="table">                           
                            <tr>
                                <th scope="col">出題する質問</th>
                                <th scope="col">回答させる形式</th>
                                <th scope="col">選択肢</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <textarea maxlength="255" class="form-control" name="content" rows="2" placeholder="業務の進捗についてお聞かせください。">{{$question_content}}</textarea>
                                    </div>
                                </td>

                                <td>
                                    @php $key = 0; @endphp
                                    @foreach ($form_types as $form_type)
                                    @php $key = $key + 1; @endphp
                                    @if ($form_typed != $form_type->code)
                                    <div class="form-check my-1">
                                        <input class="form-check-input hoge" type="radio" name="form_types_codes" id="q{{$key}}" value="{{$form_type->code}}">
                                        <label class="form-check-label" for="q{{$key}}">{{$form_type->name}}</label>
                                    </div>
                                    @else
                                    <div class="form-check my-1">
                                    <input class="form-check-input hoge" checked="checked" type="radio" name="form_types_codes" id="q{{$key}}" value="{{$form_type->code}}">
                                        <label class="form-check-label" for="q{{$key}}">{{$form_type->name}}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </td>

                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content1" class="form-control form-control-sm not_radio" placeholder="例）大変良好" value="{{$question_items[0]}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content2" class="form-control form-control-sm not_radio" placeholder="例）良好" value="{{$question_items[1]}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content3" class="form-control form-control-sm not_radio" placeholder="例）どちらともいえない" value="{{$question_items[2]}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content4" class="form-control form-control-sm not_radio" placeholder="例）悪い" value="{{$question_items[3]}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content5" class="form-control form-control-sm not_radio" placeholder="例）非常に悪い" value="{{$question_items[4]}}"></div>
                                    </div>
                                </td>
                            </tr>                            
                        </table>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="/admin/enquete/questionList" class="btn btn-secondary mx-3">戻る</a>
                                
                                <input type="submit" class="btn btn-primary mx-3" value="編集する">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
