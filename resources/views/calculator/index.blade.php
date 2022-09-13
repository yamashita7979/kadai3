@extends('layouts.app')

@section('title', '電卓')

@section('content')
<form action="/calculate" metho="post">
    @csrf
    <input type="submit" name="num" value="1">
    <input type="submit" name="num" value="2">
    <input type="submit" name="num" value="3">
    <input type="submit" name="num" value="4">
    <input type="submit" name="num" value="5">
    <input type="submit" name="num" value="6">
    <input type="submit" name="num" value="7">
    <input type="submit" name="num" value="8">
    <input type="submit" name="num" value="9">
    <input type="submit" name="num" value="0">
    <input type="submit" name="ope" value="+">
    <input type="submit" name="ope" value="-">
    <input type="submit" name="ope" value="÷">
    <input type="submit" name="ope" value="×">
    <input type="submit" name="equal" value="=">
    <input type="submit" name="clear" value="AC">
    {{ $result }}
</form>
@endsection