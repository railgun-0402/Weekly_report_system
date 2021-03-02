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
    <form action="{{ action('QuestionController@complete') }}" method="GET" class="row">
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
                        <input type="hidden" name="text{{ $textNumber }}" value="{{ $data[$texts] }}">
                        
                    </div>
                    
                @elseif ($item->form_types_code === '2') {{-- <!-- ラジオボタン --> --}}
                    @php $radioNumber = $radioNumber + 1 @endphp
                    @php $item_contents = "radio".$radioNumber @endphp
                    <div class="form-group">
                        <label>Q{{ $key }}.&nbsp;{{ $item->content }}<br>
                        &emsp;{{ $data[$item_contents] }}                            
                        </label>   
                        <input type="hidden" name="radio{{ $radioNumber }}" value="{{ $data[$item_contents] }}">                                                                                                         
                    </div>
                    
                @elseif ($item->form_types_code === '3') {{-- <!-- チェックボックス --> --}}
                    @php $checkNumber = $checkNumber + 1 @endphp
                    @php $check_item_contents = "checkbox".$checkNumber @endphp 
                    @php $check_item = $_POST[$check_item_contents]; @endphp  
                                                          
                    <div class="form-group">
                        <label>Q{{ $key }}.&nbsp;{{ $item->content }}<br>
                            @foreach ($check_item as $check)
                                &emsp;{{ $check }}<br>
                                <input type="hidden" name="check{{ $checkNumber }}[]" value="{{ $check }}">
                            @endforeach
                        </label>
                        
                    </div>
                    
                @elseif ($item->form_types_code === '4') {{-- <!-- ドロップダウンメニュー --> --}}
                    @php $dropNumber = $dropNumber + 1 @endphp
                    @php $drop_item_contents = "selects".$dropNumber @endphp
                    <div class="form-group">
                        <label>Q{{ $key }}.&nbsp;{{ $item->content }}<br>
                            &emsp;{{ $data[$drop_item_contents] }}
                        </label>
                        <input type="hidden" name="drop{{ $dropNumber }}" value="{{ $data[$drop_item_contents] }}">     
                        
                    </div>
                @else
                    <p style="color: red;"></p>
                @endif
            @endforeach

            <a class="btn btn-secondary mr-1" href="{{ url('/user/enquete/index ') }}">戻る</a>
            <button type="submit" class="btn btn-success">送信する</button>
        
        </div>
    </form>
</div>
@endsection