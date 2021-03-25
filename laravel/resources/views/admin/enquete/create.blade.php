@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('アンケート新規登録') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{url('/admin/enquete/create')}}">
                        @csrf
                        <input type="hidden" name="question_group" value="<?php echo date('Ymd'); ?>">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">出題する質問</th>
                                    <th scope="col">回答させる形式</th>
                                    <th scope="col">選択肢</th>
                                </tr>
                            </thead>
                            <tbody>

                            {{-- 初期値３問 --}}
                            @for ($i = 0; $i < 3; $i++)
                                <tr>
                                    <td scope="row">{{$i+1}}</td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" name="content{{$i+1}}" rows="2">{{old('content')}}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($form_types as $key => $form_type)
                                        <div class="form-check my-1">
                                            <input class="form-check-input" type="radio" name="form_types_code{{$i+1}}" id="q{{$i+1}}{{$key+1}}" value="{{$form_type->code}}">
                                            <label class="form-check-label" for="q{{$i+1}}{{$key+1}}">{{$form_type->name}}</label>
                                        </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><input type="text" name="item_content1{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）大変良好" value="{{old('item_content1')}}"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><input type="text" name="item_content2{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）良好" value="{{old('item_content2')}}"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><input type="text" name="item_content3{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）どちらともいえない" value="{{old('item_content3')}}"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><input type="text" name="item_content4{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）悪い" value="{{old('item_content4')}}"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><input type="text" name="item_content5{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）非常に悪い" value="{{old('item_content5')}}"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                            {{-- 初期値３問 --}}

                            </tbody>
                        </table>
                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="/admin/top" class="btn btn-secondary mx-3">戻る</a>
                                <input type="button" id="regist" class="btn btn-primary mx-3" value="登録" onclick="submit();">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
