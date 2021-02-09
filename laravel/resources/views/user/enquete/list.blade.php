@extends('layouts.app')
@section('content')
<?php
$today = date("Y-m-d"); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-secondary mb-3" href="{{ url('/user/top') }}">戻る</a>
            <div class="mb-3">アンケート回答</div>
            <table class="table table-striped">
                <tr>
                    <th scope="col">更新日</th>
                    <th scope="col">タイトル</th>
                </tr>
                @for ($i = 1; $i<=20; $i++)
                <tr>
                    <td><?php print $today; ?></td>
                    <td><a href="{{ url('/user/enquete/index') }}">アンケート{{ $i }}</a></td>
                </tr>
                @endfor
            </table>
            {{ $users -> links() }}
        </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
