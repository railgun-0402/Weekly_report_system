@extends('layouts.app')
@section('title', 'アカウント一覧')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/top') }}">戻る</a></div>
                <div class="ml-auto p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/account/create') }}">新規作成</a></div>
            </div>
            <div class="mb-3">アカウント一覧</div>
                <table class="table table-sm">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ユーザーID</th>
                        <th scope="col">氏名</th>
                        <th scope="col">Eメール</th>
                        <th scope="col">作成日</th>
                        <th scope="col" class="text-center">操作</th>
                    </tr>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                    <a href="{{ url('/admin/account/edit', $user->id) }}" type="button" class="btn btn-info mr-1">編集</a>
                                    <a href="#" type="button" class="btn btn-danger del" data-id="{{ $user->id }}">削除</a>
                                    <form method="post" action="{{ url('/admin/account/list', $user->id) }}" id="form_{{ $user->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="paginate">{{ $users->links() }}</div>
        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
@endsection
