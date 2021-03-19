@php
    $date = '';
    $checkDate = '';
    //空の配列
    $checkArray = array();
    $questionCount = '';
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
                <?php 
                    // answerに該当のユーザーコードが存在するかを確認
                    // 一度でも存在すれば、回答履歴が存在することになる
                    
                    // リンクで選択したユーザーコード
                    $userCode = $user->code;
                    // 質問から対象のユーザーの回答があるかを確認
                    foreach ($answersArray as $ans){
                        if ($userCode == $ans->user_code){
                            // 回答があれば配列に加える(→要素が０であれば回答履歴なしと判断できる)
                            array_push($checkArray, $ans->user_code);
                        }
                    }
                    $questionCount = count($checkArray);
                ?>
                    <?php if($questionCount == 0):?>
                    <tr>
                        <th scope="col">回答が有りません</th>
                    </tr>
                    <?php else:?>
                    <tr>
                        <th scope="col">閲覧したい回答日を選択してください</th>
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
