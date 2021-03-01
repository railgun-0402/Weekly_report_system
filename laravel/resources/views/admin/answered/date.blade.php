<?php

dump($user);
dump($answers);


?>
@extends('layouts.app')
@section('title', '回答日時一覧')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{url('/admin/top')}}">戻る</a></div>
            </div>
            <div class="mb-3">回答日時一覧【{{$user->full_name}}】さん</div>
                <table class="table table-sm" style="table-layout: fixed;">
                    <tr>
                        <th scope="col">日時を選択してください</th>
                    </tr>
                    <tr>
                        <td><a href="/admin/answered/show">yyyy-mm-dd</a></td>
                    </tr>
                </table>
            </div>
            {{-- <div class="paginate">{{$users->links()}}</div> --}}
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
