<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRegistController extends Controller
{
    public function userRegist()
    {
        return view('auth.register');
    }

    //　DBに登録
    public function create(Request $request)
    {
        $user = new User();
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();

        return redirect('/typingSite');
    }
}
