@extends('layouts.app')

@section('title', 'タイピング練習サイト')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/index.css')}}">
@endsection

@section('content')
<div class="content">
    @if(isset($logoutMsg))
    <p>{{ $logoutMsg }}</p>
    @endif
    <a href="{{ url('/typingSite/userRegist') }}"><button class="register-btn">新規登録</button></a>
    <a href=""><button class="to-play-btn">遊ぶ</button></a>
    <a href="{{ url('/typingSite/mst/register') }}"><button class="to-mst-btn">管理画面</button></a>
    <a href="{{ url('/typingSite/logout') }}"><button class="logout-btn">ログアウト</button></a>
</div>
@endsection