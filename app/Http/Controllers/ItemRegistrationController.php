<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemRegistrationController extends Controller
{
    public function index(Request $request)
    {
        return view('shoppingsite.itemRegistration');
    }

    // 商品登録
    public function create(Request $request)
    {
        $item = new Item();

        // トークン削除
        $form = $request->all();
        unset($form['_token']);

        // 商品情報の取得
        $item->name = $request->name;
        $item->description
            = $request->description;
        $item->price = $request->price;
        

        // 画像取得
        $image = $request->file('image_path');
        // 画像保存
        $image = $image->store('public');
        // 画像ファイル名の整形
        $path = str_replace('public/', '', $image);
        $item->image_path = $path;

        //（画像以外の情報を）DBに登録
        $item->save();
        return redirect('/regist');
    }
}
