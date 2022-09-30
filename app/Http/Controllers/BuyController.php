<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Buyhistory;
use  App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{
    public function view()
    {
        $items = Item::all();

        return view('shoppingsite.buy', [
            'items' => $items,
        ]);
    }

    // 選択した商品をカートに入れる（セッション保存）
    public function toCart(Request $request)
    {
        $items = Item::find($request->item_id);
        $request->session()->push('items_ses', $items);

        $items_ses = $request->session()->get('items_ses');
        return view('shoppingsite.cart', [
            'items_ses' => $items_ses,
        ]);
    }

    // 購入とメール送信
    public function buyItems(Request $request)
    {
        $items_ses = $request->session()->get('items_ses');

        // DB登録
        foreach ($items_ses as $item) {   
            $buyhistories = new BuyHistory();         
            $buyhistories->name = $item->name;
            if(isset($buyhistories->description)){
                $buyhistories->description = $item->description;
            }
            $buyhistories->price = $item->price;
            $buyhistories->image_path = $item->image_path;
            $buyhistories->save();
        }

        $histories = Buyhistory::all();

        // メール送信（自分のメールアドレス宛）
        Mail::send(new SendMail());

        // カートを空にする
        $request->session()->forget('items_ses');

        // 履歴画面に遷移
        return view('shoppingsite.buyHistory', [
            'items' => $histories,
        ]);
    }
    

    // カートを空にする
    public function clearCart(Request $request)
    {
        $request->session()->forget('items_ses');

        return redirect('/view');
    }
}
