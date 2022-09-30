@extends('layouts.app')

@section('title', '商品閲覧')

@section('content')
<section class="content">
    <form action="tocart" method="post">
        <div>
            <p class="buy-title">商品リスト</p>
        </div>    
        <table>
            @csrf
            <input type="submit" value="カートへ">
            @foreach ($items as $item)
                <tr>
                    <td>
                        <input type="radio" name="item_id" value="{{ $item->id }}">
                    </td>
                    <td>
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
    <div class="div-clearcart-buy">
        <form action="clearcart">
            <input type="submit" value="カートを空にする">
        </form>    
    </div>
</section>
@endsection