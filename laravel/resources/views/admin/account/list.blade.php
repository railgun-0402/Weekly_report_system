@extends('layouts.app')
@section('title', 'アカウント一覧')
@section('content')
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
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/top') }}">戻る</a></div>
                <div class="ml-auto p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/register') }}">新規作成</a></div>
            </div>
            <div class="mb-3 h5">社員一覧</div>
                <table class="table table-sm">
                    <tr>
                        <th scope="col">社員コード</th>
                        <th scope="col">氏　名</th>
                        <th scope="col">Eメールアドレス</th>
                        <th scope="col">ユーザー登録日時</th>
                        <th scope="col" class="text-center">操　作</th>
                    </tr>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->code }}</td>
                            <td>{{ $user->name }}</td>
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

        <div class="col">
            <div id="example"></div>
        </div>
    </div>
</div>
@endsection
