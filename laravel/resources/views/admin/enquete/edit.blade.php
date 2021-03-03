@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('配信アンケート登録画面') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{url('/admin/enquete/edit')}}">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="question_group" value="{{$now}}">
                        <p class="font-weight-bold text-danger">「出題する質問／回答していただく形式／回答していただく選択肢」を設定してください。<br />
                            質問の数を追加したい際は、画面左下の＋ボタンを押して行を追加してください。</p>
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

                            {{-- ７問 --}}
                            @foreach ($questions as $key => $question)
                            <tr>
                                <td scope="row">{{$key+1}}</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content{{$key+1}}" rows="2" placeholder="業務の進捗についてお聞かせください。">{{$question->content}}</textarea>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($form_types as $key2 => $form_type)
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" name="form_types_code{{$key+1}}" id="q{{$key+1}}{{$key2+1}}" value="{{$form_type->code}}" <?php if ($question->form_types_code == $form_type->code) { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="q{{$key+1}}{{$key2+1}}">{{$form_type->name}}</label>
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content1{{$key+1}}" class="form-control form-control-sm not_radio{{$key+1}}" placeholder="例）大変良好" value="{{$question->item_content1}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content2{{$key+1}}" class="form-control form-control-sm not_radio{{$key+1}}" placeholder="例）良好" value="{{$question->item_content2}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content3{{$key+1}}" class="form-control form-control-sm not_radio{{$key+1}}" placeholder="例）どちらともいえない" value="{{$question->item_content3}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content4{{$key+1}}" class="form-control form-control-sm not_radio{{$key+1}}" placeholder="例）悪い" value="{{$question->item_content4}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" name="item_content5{{$key+1}}" class="form-control form-control-sm not_radio{{$key+1}}" placeholder="例）非常に悪い" value="{{$question->item_content5}}"></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            {{-- ７問 --}}

                            </tbody>
                        </table>
                        <button id="plus" type="button" class="btn btn-primary rounded-circle p-0" style="width:2rem;height:2rem;">＋</button>
                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="/admin/top" class="btn btn-secondary mx-3">戻る</a>
                                <input type="submit" class="btn btn-primary mx-3" value="登録">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
