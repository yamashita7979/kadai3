<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class BuyController extends Controller
{
    public function view()
    {
        $items = Item::all();

        return view('shoppingsite.buy', compact('items'));
    }

    public function toCart(Request $request)
    {
        $items = Item::find($request->item_id);
        $request->session()->put('items_ses', $items);
        $items_ses = $request->session()->get('items_ses');

        return view('shoppingsite.cart', compact('items_ses'));
    }
}
