@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<form action="create" method="post" enctype="multipart/form-data">
    <a href="/view">商品閲覧へ</a>
    @csrf
    <p>商品登録</p>
    <div>
        <label for="">商品名</label>
        <input type="text" name="name">
    </div>
    <div class="description">
        <label for="">商品説明</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>     
    </div>
    <div>
        <label for="">価格</label>
        <input type="text" name="price">    
    </div>
    <div class="image">
        <label for="">商品写真</label>
        <input type="file" name="image_path">      
    </div>
    <input type="submit" value="商品登録" class="submit">
</form>
@endsection