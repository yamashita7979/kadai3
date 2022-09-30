@extends('layouts.app')

@section('title', 'カート')

@section('content')
<section class="content">
        <form action="remove" method="post">
            <div>
                <a href="/view" class="link-cart">商品閲覧へ</a>    
            </div>
            <div class="cart-title">
                <p>カートの中身</p>
            </div>
            <div>        
            <table>
                @csrf
                @foreach ($items_ses as $item)
                    <tr>
                        <td class="img-cart">
                            <img src="{{ Storage::url($item->image_path) }}" width="160%">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        @if(isset($item->description))
                            <td>{{ $item->description }}</td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </form>
    </div>
    <div class="div-buyitems">
        <form action="buyitems">
            <input type="submit" value="全て購入する">
        </form>
    </div>
    <div class="div-clearcart">
        <form action="clearcart">
            <input type="submit" value="カートを空にする">
        </form>
    </div>
</section>
@endsection