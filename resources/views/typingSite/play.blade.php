@extends('layouts.app')

@section('title', 'プレイ画面')

@section('content')
<h1>
    @php
    if($judgment_flag == "0"){
        echo '不正解..';
    }elseif($judgment_flag == "1"){
        echo '正解!!';
    }
    @endphp 
</h1>
<p>{{ $japanese_word }}</p>
<p>{{ $english_word }}</p>
<form action="/submitTopic" type="post" class="content">
    @csrf
    <input type="text" name="input">
    <input type="submit" value="送信">
</form>    
</form>
<a href="{{ url('/typingSite') }}"><button type="button">ホームに戻る</button></a>
@endsection