@extends('layouts.master')

@section('title', '編集画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/mstEditDisplay.css')}}">
@endsection

@section('content')
<form action="/update" class="content" method="post">
    @csrf
    <div>
        <p>編集後に確定ボタンを押してください</p>
    </div>
    <input type="hidden" name="id" value="{{ $form->id }}">
    <div class="japanese-word">
        <label>日本語文<input type="text" name="japanese_word" value="{{ $form->japanese_word }}"></label>
    </div>
    <div class="english-word">
        <label>英語文<input type="text" name="english_word" value="{{ $form->english_word}}"></label>
    </div>
    <div>
        <input type="submit" value="確定">
    </div>
</form>
<div class="back-btn">
    <a href="{{ url('/typingSite') }}">ホームへ</a>
</div>
@endsection