@extends('layouts.app')

@section('title', '電卓')

@section('content')
<div>
<form action="/calculate" class="content" method="post">
    @csrf
        <div>
            <input type="text" class="textbox" value="{{ $result }}" readonly>    
        </div>
        <div>
            <input type="submit" name="num" class="button" value="7">
            <input type="submit" name="num" class="button" value="8">
            <input type="submit" name="num" class="button" value="9">
            <input type="submit" name="ope" class="button" value="÷">    
        </div>
        <div>
            <input type="submit" name="num" class="button" value="4">
            <input type="submit" name="num" class="button" value="5">
            <input type="submit" name="num" class="button" value="6">
            <input type="submit" name="ope" class="button" value="×">    
        </div>
        <div>
            <input type="submit" name="num" class="button" value="1">
            <input type="submit" name="num" class="button" value="2">
            <input type="submit" name="num" class="button" value="3">
            <input type="submit" name="ope" class="button" value="-">    
        </div>
        <div>
            <input type="submit" name="num" class="button" value="0">
            <input type="submit" name="clear" class="button" value="AC">
            <input type="submit" name="equal" class="button" value="=">
            <input type="submit" name="ope" class="button" value="+">            
        </div>    
</form>
</div>
@endsection