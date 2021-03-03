@php
    $date = '';
    $checkDate = '';
@endphp
@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{url('/admin/answered/list')}}">戻る</a></div>
            </div>
            <div class="mb-3">回答日時一覧【{{$user->name}}】さん</div>
                <table class="table table-sm" style="table-layout: fixed;">
                    <tr>
                        <th scope="col">閲覧したい回答日を選択してください</th>
                    </tr>

                    <?php if(empty($answersArray)):?>
                    <tr>
                        <td>回答した履歴がありません。</td>
                    </tr>
                    <?php endif; ?>

                    @foreach ($answersArray as $ans)
                        @php
                            if ($checkDate != $ans->user_code){
                                $date = '';
                            }
                            $user_code = (string)$user->code;
                            $checkDate = $user_code;
                            $judge = $ans->user_code == $user_code;
                            $judge2 = $ans->question_id != $date;
                        @endphp

                            @if ($judge == true and $judge2 == true)
                            <tr>
                                <td><a href="/admin/answered/show/{{$ans->question_id}}/{{$user->code}}">{{$ans->question_id}}</a></td>
                            </tr>
                            @endif
                        @php
                            $date = $ans->question_id;
                            $checkDate = $ans->user_code;
                        @endphp
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
