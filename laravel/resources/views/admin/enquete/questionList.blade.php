@extends('layouts.app')
@section('title', 'アンケート一覧')
@section('content')
@php
    $checkDate = '';
    $today = date("Ymd");
    $newDate = '';
@endphp
<div class="container">
    <div class="row">
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
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{url('/admin/top')}}">戻る</a></div>
                <div class="ml-auto p-2 bd-highlight"><a class="btn btn-secondary" href="/admin/enquete/edit">質問を新規に作成する</a></div>
            </div>
            <div class="mb-3">アンケート一覧</div>            
                <table class="table table-sm" style="table-layout: fixed;">
                    <tr>
                        <th scope="col" class="w-25">作成日</th>
                        <th scope="col">質問グループ</th>
                    </tr>
                    @foreach ($questionsArray as $arr)
                    @php
                        $judge = $checkDate != $arr->question_group;
                        $makeDate = $arr->question_group;       
                    @endphp                 
                
                    @if (new DateTime($makeDate) > new DateTime($newDate))
                        @php $newDate = $makeDate; @endphp
                    @elseif ($newDate == '')
                        @php $newDate = $makeDate; @endphp
                    @endif                        
                
                    @if ($judge)
                    <tr>
                        <td>{{$makeDate}}</td>
                        <td><a href="/admin/enquete/makeList/{{$makeDate}}">{{$makeDate}} に作成した質問</a></td>
                    </tr>
                    @endif
                    @php
                        $checkDate = $arr->question_group;
                    @endphp
                    @endforeach
                    
                </table>
            </div>

        <div class="col">
            <div class="text-danger" style="font-size:18px;">現時点では、{{$newDate}}に作成した質問が出題されます。</div>
        </div>
    </div>
</div>
@endsection