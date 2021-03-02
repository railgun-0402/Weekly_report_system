@extends('layouts.app')
@section('title', 'アンケート回答者一覧')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{url('/admin/top')}}">戻る</a></div>
            </div>
            <div class="mb-3">アンケート回答者一覧</div>
                <table class="table table-sm" style="table-layout: fixed;">
                    <tr>
                        <th scope="col" class="w-25">社員番号</th>
                        <th scope="col">氏名</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->code}}</td>
                        <td><a href="/admin/answered/date/{{$user->id}}">{{$user->full_name}}／{{$user->name}}</a></td>
                    </tr>
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