@extends('layouts.app')

@section('title', '商品閲覧')

@section('content')
<section class="content">
    <p>商品リスト</p>
    <form action="tocart" method="post">
        <table>
            @csrf
            <input type="submit" value="カートへ">
            @foreach ($items as $item)
                <tr>
                    <td>
                        <input type="checkbox" name="item_id[]" value="{{ $item->id }}">
                    </td>
                    <td>
                        <img src="{{ Storage::url($item->image_path) }}" width="130%">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                </tr>
            @endforeach
        </table>
    </form>
</section>
@endsection