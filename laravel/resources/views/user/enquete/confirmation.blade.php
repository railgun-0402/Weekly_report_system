@extends('layouts.app')
@section('content')

@php
$textNumber = 0;
$checkNumber = 0;
$radioNumber= 0;
$dropNumber = 0;
@endphp

<style>
</style>
<div class="container">
    <form action="/user/enquete/complete" method="POST" class="row">
    @csrf
        <div class="kakuninn">
            <h4 class="mb">回答内容確認</h4><br>
            <h5 class="mb2">以下の内容で送信します。宜しいですか？</h5>

            @foreach ($items as $key => $item)
                @php $key = $key + 1 @endphp
                @if ($item->form_types_code === '1') {{-- <!-- テキストボックス --> --}}
                    @php $textNumber = $textNumber + 1 @endphp    
                    @php $texts = "text".$textNumber @endphp
                    <div class="form-group">
                        <label for="text{{ $key }}">Q{{ $key }}.&nbsp;{{ $item->content }}<br>                            
                            &emsp;{{ $data[$texts] }}
                        </label>
                        
                    </div>
                    
                @elseif ($item->form_types_code === '2') {{-- <!-- ラジオボタン --> --}}
                    @php $radioNumber = $radioNumber + 1 @endphp
                    @php $item_contents = "radio".$radioNumber @endphp
                    <div class="form-group">
                        <label>Q{{ $key }}.&nbsp;{{ $item->content }}<br>
                            <!--{{ $data[$item_contents] }} -->
                            &emsp;OKです
                        </label>
                                                                                                            
                    </div>
                    
                @elseif ($item->form_types_code === '3') {{-- <!-- チェックボックス --> --}}
                    <div class="form-group">
                        <label>Q{{ $key }}.&nbsp;{{ $item->content }}<br>
                            &emsp;普通
                        </label>
                        
                    </div>
                @elseif ($item->form_types_code === '4') {{-- <!-- ドロップダウンメニュー --> --}}
                    <div class="form-group">
                        <label>Q{{ $key }}.&nbsp;{{ $item->content }}<br>
                            &emsp;良いです
                        </label>
                        
                    </div>
                @else
                    <p style="color: red;">質問が存在しません。</p>
                @endif
            @endforeach

            <a class="btn btn-secondary mr-1" href="{{ url('/user/enquete/index ') }}">戻る</a>
            <button type="submit" class="btn btn-success">送信する</button>
        
        </div>
    </form>
</div>
@endsection