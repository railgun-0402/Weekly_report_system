@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント情報編集</div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('patch')
                        @foreach ($questions as $key => $question)
                            <div class="form-group">
                                <label for="name">質問{{ $key + 1 }}</label>
                                <div><input id="" type="text" name="" class="form-control" value="{{ $question->content }}"></div>
                            </div>
                        @endforeach
                        <a class="btn btn-secondary" href="{{ url('/admin/enquete/list') }}">戻る</a>
                        <button type="submit" class="btn btn-success">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
