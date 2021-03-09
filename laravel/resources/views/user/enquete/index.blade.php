@extends('layouts.app')
@section('content')

@php
$textNumber = 0;
$checkNumber = 0;
$radioNumber= 0;
$dropNumber = 0;

// 質問が全て用意されていないcontentが全てnullかどうか判定
$flg = false;
$results = [];
foreach ($items as $item) {
    array_push($results, $item->content);
}

$array_unique = array_unique($results);
if (count($array_unique) == 1 && $array_unique[0] == null) {
    $flg = true;
}

@endphp

<style>
    header { margin-top: 30px; color: #43A047; }
    hr { border-width: 3px;border-color: #43A047; }
    h1 { font-size: 25px;font-weight: bold;margin: 0;text-align: center; }
    .align-light { text-align: right; }
    .form-group { margin-bottom: 35px; }
    footer p { text-align: center; }
    input:required { background: #ffcdd2; }
    input[type="email"]:invalid { background: #ffcdd2; }
    input:valid { background: transparent; }
    input:focus { background: #DCEDC8; }
</style>

<div class="container">
    <form action="/user/enquete/confirmation" method="POST" class="row">
    @csrf
        <div class="col-sm-8 col-sm-offset-2">
            <h4 class="mb-3">アンケート回答画面</h4>

                <?php if ($flg): ?>
                <p class="not_yet h5 mb-3">質問データがまだ用意されておりません。</p>

                <?php else : ?>
                @foreach ($items as $key => $item)
                    @php $key = $key + 1 @endphp

                    @if ($item->form_types_code === '1') {{-- <!-- テキストボックス --> --}}
                        @php $textNumber = $textNumber + 1 @endphp
                        <div class="form-group">
                            <label for="text{{ $textNumber }}"><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label>
                            <textarea maxlength="255" rows="3" value="" id="text{{ $textNumber }}" name="text{{ $textNumber }}" class="form-control" placeholder="○○です。" required></textarea>
                        </div>

                    @elseif ($item->form_types_code === '2') {{-- <!-- ラジオボタン --> --}}
                        @php $radioNumber = $radioNumber + 1 @endphp
                        <div class="form-group">
                            <label><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label><br>
                            @for ($i = 1; $i <= $item->selectable_item; $i++)
                                @php $item_contents = "item_content".$i @endphp
                                <div class="form-group">
                                    <input type="radio" name="radio{{ $radioNumber }}" id="radio{{ $key }}{{ $i }}" value="{{ $item -> $item_contents }}">
                                    <label class="form-check-label" for="radio{{ $key }}{{ $i }}">{{ $item -> $item_contents }}</label>
                                </div>
                            @endfor
                        </div>

                    @elseif ($item->form_types_code === '3') {{-- <!-- チェックボックス --> --}}
                        @php $checkNumber = $checkNumber + 1 @endphp
                        <div class="form-group">
                            <label><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label>
                            @for ($i = 1; $i <= $item->selectable_item; $i++)
                            @php $item_contents = "item_content".$i @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox{{ $checkNumber }}[]" id="checkbox{{ $key }}{{ $i }}" value="{{ $item -> $item_contents }}">
                                    <label class="form-check-label" for="checkbox{{ $key }}{{ $i }}">{{ $item -> $item_contents }}</label>
                                </div>
                            @endfor
                        </div>

                    @elseif ($item->form_types_code === '4') {{-- <!-- ドロップダウンメニュー --> --}}
                        @php $dropNumber = $dropNumber + 1 @endphp
                        <div class="form-group">
                            <label><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label>
                            <select id="" name="selects{{ $dropNumber }}" class="form-control" required>
                                <option value="">選択してください</option>
                                @for ($i = 1; $i <= $item->selectable_item; $i++)
                                    @php $drop_item_contents = "item_content".$i @endphp
                                    <option value="{{ $item -> $drop_item_contents }}">{{ $item -> $drop_item_contents }}</option>
                                @endfor
                            </select>
                        </div>

                    @else
                        {{-- <p style="color: red;">質問が存在しません。</p> --}}
                    @endif

                @endforeach

                <?php endif; ?>

                <a class="btn btn-secondary mr-1" href="{{ url('/user/top') }}">戻る</a>
            <button type="submit" class="btn btn-success send">送信する</button>
        </div>
    </form>
</div>
@endsection
