@extends('layouts.app')

@section('title', '購入履歴')

@section('content')
<section class="content">
    <a href="/view">商品閲覧へ</a>
    <div>
        <p class="buy-title">購入履歴</p>
    </div>    
    <table>
        @foreach ($items as $item)
            <tr>
                <td>
                    <img src="{{ Storage::url($item->image_path) }}" width="160%">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                @if(isset($item->description))
                    <td>{{ $item->description }}</td>
                @endif
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </table>
</section>
@endsection