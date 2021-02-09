@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a class="btn btn-secondary" href="{{ url('/user/top') }}">戻る</a>
            <div class="mb-3">アカウント一覧</div>
            <table class="table table-striped">
                <tr>
                    <th scope="col">更新日</th>
                    <th scope="col">タイトル</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                {{-- @for ($i = 0; $i<=20; $i++)
                <tr>
                    <td>2020/12/01</td>
                    <td><a href="{{ url('/user/enquete/index') }}">アンケート①</a></td>
                </tr>
                @endfor --}}
            </table>

        </div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
