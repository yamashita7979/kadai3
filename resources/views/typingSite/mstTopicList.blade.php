@extends('layouts.master')

@section('title', 'お題一覧画面')

@section('content')
<table>
    <tr><th>登録センテンス一覧 <a href="{{ url('/typingSite') }}">ホームへ</a></th></tr>
    @foreach ($topics as $topic)
        <tr>
            <td>
                {{ $topic->getData() }}
            </td>
        </tr>
    @endforeach
</table>
@endsection