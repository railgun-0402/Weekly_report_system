@php $date = ''; @endphp
@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{url('/admin/answered/list')}}">戻る</a></div>
            </div>
            <div class="mb-3">回答日時一覧【{{$user->full_name}}】さん</div>
                <table class="table table-sm" style="table-layout: fixed;">
                    <tr>
                        <th scope="col">閲覧したい回答日を選択してください</th>
                    </tr>
                    @foreach ($answersArray as $ans)
                        @php 
                            $user_code = $user->id;
                        @endphp 
                            @if ($ans->user_code == $user_code and $ans->question_id != $date)
                            <tr>
                                <td><a href="/admin/answered/show/{{$ans->question_id}}/{{$user->id}}">{{$ans->question_id}}</a></td>  
                                        
                            </tr>
                            @endif
                        @php $date = $ans->question_id; @endphp
                    @endforeach
                </table>
            </div>
            {{-- <div class="paginate">{{$users->links()}}</div> --}}
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection