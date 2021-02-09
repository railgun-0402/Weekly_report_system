@extends('layouts.app')
@section('content')

@php
$textNumber = 0;
$checkNumber = 0;
$radioNumber= 0;
$dropNumber = 0;
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
            <h4 class="mb-3">アンケート（設問数：{{ count($items) }}）</h4>
                @foreach ($items as $key => $item)
                    @php $key = $key + 1 @endphp
                    
                    @if ($item->form_types_code === '1') {{-- <!-- テキストボックス --> --}}
                        @php $textNumber = $textNumber + 1 @endphp
                        <div class="form-group">
                            <label for="text{{ $textNumber }}"><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label>
                            <textarea rows="3" value="" id="text{{ $textNumber }}" name="text{{ $textNumber }}" class="form-control" placeholder="placeholder" required></textarea>
                              
                        </div>
                        
                    @elseif ($item->form_types_code === '2') {{-- <!-- ラジオボタン --> --}}
                        @php $radioNumber = $radioNumber + 1 @endphp
                        <div class="form-group">
                            <label><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label><br>
                            
                            <!-- @for ($i = 1; $i <= 5; $i++)
                                <div class="form-group">
                                    <input class="form-check-input" type="radio" name="radio{{ $key }}" id="radio{{ $key }}{{ $i }}" value="">
                                    <label class="form-check-label" for="radio{{ $key }}{{ $i }}">
                                        {{ $item -> item_content2 }}
                                    </label>
                                </div>

                            @endfor -->

                            @for ($i = 1; $i <= $item->selectable_item; $i++)
                                    
                                @php $item_contents = "item_content".$i @endphp
                                <div class="form-group">
                                    <lavel class="form-check-label" for="radio{{ $radioNumber }}">
                                        <input type="radio" name="radio{{ $radioNumber }}" id="radio{{ $radioNumber }}" value="">
                                        {{ $item -> $item_contents }}
                                    </lavel>
                                </div>
                            @endfor

                            
                            <!-- @for ($i = 1; $i <= $item->selectable_item; $i++) -->
                                <!-- @foreach ($itemsArray as $itemArray)

                                    @if (!empty($itemArray['item_content1']))
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio{{ $key }}" id="radio{{ $key }}{{ $i }}" value="">
                                        <label class="form-check-label" for="radio{{ $key }}{{ $i }}">
                                            {{ $itemArray['item_content1'] }}
                                        </label>
                                    </div>
                                    @elseif (!empty($itemArray['item_content1']))

                                    @else

                                    @endif

                                @endforeach -->

                                








                            <!-- @endfor -->
                        </div>
                    @elseif ($item->form_types_code === '3') {{-- <!-- チェックボックス --> --}}
                        <div class="form-group">
                            <label><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label>
                            @for ($i = 1; $i <= $item->selectable_item; $i++)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox{{ $key }}" value="" id="checkbox{{ $key }}{{ $i }}">
                                    <label class="form-check-label" for="checkbox{{ $key }}{{ $i }}">{{ $i }}-：標準のチェックボックス</label>
                                </div>
                            @endfor
                        </div>
                    @elseif ($item->form_types_code === '4') {{-- <!-- ドロップダウンメニュー --> --}}
                        <div class="form-group">
                            <label><span class="badge badge-danger">必須</span>&nbsp;Q{{ $key }}.&nbsp;{{ $item->content }}</label>
                            <select id="" name="selects{{ $key }}" class="form-control" required>
                                <option value="">選択してください</option>
                                @for ($i = 1; $i <= $item->selectable_item; $i++)
                                    <option value="{{$key}}{{$i}}">選択肢{{$key}}{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    @else
                        <p style="color: red;">質問が存在しません。</p>
                    @endif
                @endforeach                
                <a class="btn btn-secondary mr-1" href="{{ url('/user/enquete/list') }}">戻る</a>
            <button type="submit" class="btn btn-success">送信する</button>
        </div>
    </form>
</div>
@endsection
