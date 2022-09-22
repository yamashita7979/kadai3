@extends('layouts.master')

@section('title', '削除画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/mstDeleteTopic.css')}}">
@endsection

@section('content')
<table class="content">
    <form action="/remove" class="form-remove" type="post">
        @csrf
        <tr><th>
            <input type="submit" value="削除">
            削除画面
        </th></tr>
        @foreach ($topics as $topic)
            <tr>
                <td>
                    <input type="checkbox" name="topic_id[]" value="{{ $topic->id }}">
                    {{ $topic->getData() }}
                </td>
            </tr>
        @endforeach
    </form>
</table>
<div class="page">
    {{ $topics->links() }}
</div>
<div class="back-btn">
    <a href="{{ url('/typingSite') }}">ホームへ</a>
</div>
@endsection