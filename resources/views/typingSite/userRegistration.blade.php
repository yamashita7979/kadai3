@extends('layouts.app')

@section('title', 'ユーザー登録')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/userRegist.css')}}">
@endsection

@section('content')
<form action="/userCreate" class="content">
    @csrf
    <label>NAME<input type="text" name="name"></label>
    <label>PASSWORD<input type="text" name="password"></label>
    <input type="submit" value="送信">
    <a href="{{ url('/typingSite') }}">ホームへ</a>
</form>
@endsection