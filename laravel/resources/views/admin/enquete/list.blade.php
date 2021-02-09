@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/top') }}">戻る</a></div>
                <div class="ml-auto p-2 bd-highlight"><a class="btn btn-secondary" href="{{ url('/admin/enquete/create') }}">新規作成</a></div>
            </div>
            <div class="mb-3">配信（予定）アンケート一覧</div>
            <table class="table table-sm">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">アンケート名</th>
                    <th scope="col">作成日</th>
                    <th scope="col">配信日</th>
                    <th scope="col" class="text-center">操作</th>
                </tr>
                @foreach ($enqueteNames as $key => $enqueteName)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $enqueteName }}</td>
                        <td><?= date('Y-m-d H:i') ?></td>
                        <td></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="{{ url('/admin/enquete/edit', $key + 1) }}" type="button" class="btn btn-info mr-1">編集</a>
                                <a href="#" type="button" class="btn btn-danger del" data-id="{{ $key + 1 }}">削除</a>
                                <form method="post" action="{{ url('/admin/enquete/list', $key + 1) }}" id="form_{{ $key + 1 }}">
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
<script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
@endsection
