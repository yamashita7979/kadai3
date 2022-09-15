@extends('layouts.master')

@section('title', '登録画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/mstRegisterTopic.css')}}">
@endsection

@section('content')
<form action="/create" class="content" method="post">
    @csrf
    <div>
        <p>登録するセンテンスを入力してください。</p>
    </div>
    <div>
        <label>日本語文<input type="text" name="japanese_word"></label>
    </div>
    <div>
        <label>英語文<input type="text" name="english_word"></label>
    </div>
    <div>
        <input type="submit" value="確定">
    </div>
    <div>
        <a href="{{ url('/typingSite') }}">ホームへ</a>
    </div>
</form>
@endsection