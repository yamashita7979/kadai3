@extends('layouts.app')

@section('title', '結果画面')

@section('content')
<table>
    <tr><th>結果一覧</th></tr>

    @for($i=0; $i<5; $i++)

    <tr>
        <td>
        <p>{{ $i + 1 }}</p>
        </td>
        <td>
            @if($results["judgment_flag"][$i] == "0")
            <p>×</p>
            @elseif($results["judgment_flag"][$i] == "1")
            <p>〇</p>
            @else                
            @endif
        </td>
        <td>{{ $results["vals"][$i] }}</td>
    </tr>

    @endfor
</table>
<a href="/typingSite/play"><button type="button">もう一度遊ぶ</button></a>
@endsection