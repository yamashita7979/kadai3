@extends('layouts.app')

@section('title', 'プレイ画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/play.css')}}">
@endsection

@section('content')

    <div class="play-message">
        @if($judgment_flag == "0")
            <h1><span class="error-msg">不正解..</span></h1>
        @elseif($judgment_flag == "1")
            <h1><span class="correct-msg">正解!!</span></h1>
        @else
            <h3>タイピングスタート!!</h3>
        @endif
    </div>

    <div class="play-main">

        <p>{{ $japanese_word }}</p>
        <p>{{ $english_word }}</p>
        <form action="/submitTopic" type="post">
            @csrf
            <input type="text" name="input" class="input">
            <input type="submit" value="送信" class="submit">
        </form>
        <div class="back-btn">
            <a href="{{ url('/typingSite') }}"><button type="button">ホームに戻る</button></a>
        </div>  
    </div>

@endsection