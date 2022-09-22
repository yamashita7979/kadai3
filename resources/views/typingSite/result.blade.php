@extends('layouts.app')

@section('title', '結果画面')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('/assets/css/result.css')}}">
@endsection

@section('content')
<div class="title">
    <h3>結果一覧</h3>
</div>

<table class="content">
    <tr>
        <td><p class="seitoritsu">正答率</p></td>
        <td><p class="percentage">{{ $results["info_correct"]['percentage'] }}%</p></td>
        <td><p class="count">5問中{{ $results["info_correct"]['count'] }}問</p></td>
    </tr>

    @for($i=0; $i<5; $i++)

    <tr>
        <td>
        <p class="number">{{ $i + 1 }}</p>
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

<div>
    <a href="/typingSite/play" class="back-btn"><button type="button">もう一度遊ぶ</button></a> 
</div>
@endsection