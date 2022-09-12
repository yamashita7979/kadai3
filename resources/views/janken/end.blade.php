@extends('layouts.app')

@section('title', 'じゃんけんゲーム')

@section('content')
<div class="content">
    <div class="hands">
        <table>
            <tr>
                <th>あなた</th><th></th><th>CPU</th>
            </tr>
            <tr>
                <td>
                @include('components.myhand')
                </td>
                <td>
                    <h3>vs</h3>
                </td>
                <td>
                @include('components.cpuhand')
                </td>
            </tr>
        </table>
    </div>
    <div>
        <h1>{{ $param['resultMsg'] }}</h1>
    </div>
    <div>
        <form action="/again" method="get">
        <input type="submit" class="submit-btn-parent" value="もう一度">
        </form>
    </div>
</div>
@endsection