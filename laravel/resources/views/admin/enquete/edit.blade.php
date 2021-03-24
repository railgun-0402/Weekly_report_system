@extends('layouts.app')
@section('content')
@php
    $today = date("Ymd");
@endphp
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
                <div class="card-header">{{ __('配信アンケート登録画面') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{url('/admin/enquete/edit')}}">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="question_group" value="{{$now}}">
                        <p class="font-weight-bold text-danger">「出題する質問／回答していただく形式／回答していただく選択肢」を設定してください。</p>
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
                            {{-- ７問 --}}
                            
                            @for ($i=1; $i <= 5; $i++)
                            <tr>
                                <td scope="row">{{$i}}</td>
                                <td>
                                    <div class="form-group">
                                        <textarea maxlength="255" class="form-control" name="content{{$i+1}}" rows="2" placeholder="業務の進捗についてお聞かせください。"></textarea>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($form_types as $i2 => $form_type)
                                    <div class="form-check my-1">
                                    <input class="form-check-input" type="radio" name="form_types_code{{$i+1}}" id="q{{$i+1}}{{$i2+1}}" value="{{$form_type->code}}">
                                        <label class="form-check-label" for="q{{$i+1}}{{$i2+1}}">{{$form_type->name}}</label>
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content1{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）大変良好" value=""></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content2{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）良好" value=""></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content3{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）どちらともいえない" value=""></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content4{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）悪い" value=""></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12"><input maxlength="30" type="text" name="item_content5{{$i+1}}" class="form-control form-control-sm not_radio{{$i+1}}" placeholder="例）非常に悪い" value=""></div>
                                    </div>
                                </td>
                            </tr>
                            @endfor                                                        
                            
                            
                            
                            {{-- ７問 --}}

                            </tbody>
                        </table>
                                                
                        <div class="item form-group text-center">
                            <div class="bd-example">
                                <a href="/admin/enquete/questionList" class="btn btn-secondary mx-3">戻る</a>
                                <input type="button" class="btn btn-primary mx-3" value="登録" onclick="submit();">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
