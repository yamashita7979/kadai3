@extends('layouts.app')

@section('title', 'じゃんけんゲーム')

@section('content')
<form action="/janken" method="post">
    @csrf
    <div class="content">
        <h3 class="yell">じゃーんけん..</h3>
        <table>
            <tr>
                <th><label for="goo" class="hands-start">グー</label></span></th>
                <th><label for="choki" class="hands-start">チョキ</label></th>
                <th><label for="par" class="hands-start">パー</label></th>
            </tr>
            <tr>
                <td><input type="radio" name="hand" id="goo" class="hands-start" value="0"></td>
                <td><input type="radio" name="hand" id="choki" class="hands-start" value="1"></td>
                <td><input type="radio" name="hand" id="par" class="hands-start" value="2"></td>
            </tr>
        </table>
        <input type="submit" class="submit-btn-parent" value="ホイ！">
    </div>
    <input type="radio" name="hand" value="" checked="checked" style="display:none;" />
</form>
@endsection