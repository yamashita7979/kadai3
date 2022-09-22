@extends('layouts.master')

@section('title', '編集選択画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/mstEditTopic.css')}}">
@endsection

@section('content')
<table class="content">
    <form action="/editDisplay" class="form-remove" type="post">
        @csrf
        <tr><th>
            <input type="submit" value="編集">
            編集画面
        </th></tr>
@foreach ($topics as $topic)
        <tr>
            <td>
                <input type="radio" name="topic_id" value="{{ $topic->id }}">
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