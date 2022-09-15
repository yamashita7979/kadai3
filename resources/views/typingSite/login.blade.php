@extends('layouts.app')

@section('title', 'ログイン')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/login.css')}}">
@endsection

@section('content')
<form action="" class="content">
    <label>NAME<input type="text" name="name"></label>
    <label>PASSWORD<input type="text" name="pass"></label>
    <input type="submit" value="送信">
    <a href="{{ url('/typingSite') }}">ホームへ</a>
</form>
@endsection