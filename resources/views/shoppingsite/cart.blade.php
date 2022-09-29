@extends('layouts.app')

@section('title', 'カート')

@section('content')
<a href="/view">商品閲覧へ</a>

<section class="content">
    <p>カートの中身</p>
    <form action="delete" method="post">
        <table>
            @csrf
            <input type="submit" value="削除">
            @foreach ($items_ses as $item)
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