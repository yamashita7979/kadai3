@extends('layouts.master')

@section('title', 'お題一覧画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/mstTopicList.css')}}">
@endsection

@section('content')
<table class="content">
    <tr><th>登録センテンス一覧 </th></tr>
    @foreach ($topics as $topic)
        <tr>
            <td>
                {{ $topic->getData() }}
            </td>
        </tr>
    @endforeach
</table>
<div class="page">
    {{ $topics->links() }}
</div>
<div class="back-btn">
    <a href="{{ url('/typingSite') }}">ホームへ</a>
</div>
@endsection