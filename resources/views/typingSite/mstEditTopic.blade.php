@extends('layouts.master')

@section('title', '編集画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/mstEditTopic.css')}}">
@endsection

@section('content')
<table>
    <tr><th> 編集画面 <a href="{{ url('/typingSite') }}">ホームへ</a></th></tr>
    @foreach ($topics as $topic)
        <tr>
            <td>
                <input type="checkbox" name="{{ $topic->id }}">
                {{ $topic->getData() }}
            </td>
        </tr>
    @endforeach
</table>
@endsection