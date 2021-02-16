@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('アンケート新規登録') }}</div>
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

                            <tr>
                                <td scope="row">1</td>
                                <td>業務の進捗はどうですか？</td>
                                <td>
                                    @foreach ($form_types as $key => $form_type)
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" name="q" id="q{{$key + 1}}" value="{{$form_type->code}}">
                                        <label class="form-check-label" for="q{{$key + 1}}">{{$form_type->name}}</label>
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" class="form-control form-control-sm not_radio" placeholder="例）大変良好"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" class="form-control form-control-sm not_radio" placeholder="例）良好"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" class="form-control form-control-sm not_radio" placeholder="例）どちらともいえない"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" class="form-control form-control-sm not_radio" placeholder="例）悪い"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input type="text" class="form-control form-control-sm not_radio" placeholder="例）非常に悪い"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新規登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
