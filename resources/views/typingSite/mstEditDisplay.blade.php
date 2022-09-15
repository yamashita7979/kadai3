@extends('layouts.master')

@section('title', '編集画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/.css')}}">
@endsection

@section('content')
<form action="/update" class="content" method="post">
    @csrf
    <div>
        <p>編集後に確定ボタンを押してください</p>
    </div>
    <input type="hidden" name="id" value="{{ $form->id }}">
    <div>
        <label>日本語文<input type="text" name="japanese_word" value="{{ $form->japanese_word }}"></label>
    </div>
    <div>
        <label>英語文<input type="text" name="english_word" value="{{ $form->english_word}}"></label>
    </div>
    <div>
        <input type="submit" value="確定">
    </div>
    <div>
        <a href="{{ url('/typingSite') }}">ホームへ</a>
    </div>
</form>
@endsection