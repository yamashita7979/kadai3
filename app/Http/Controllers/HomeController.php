<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('typingSite.index');
    }

    public function logout()
    {
        Auth::logout();
        $logoutMsg = 'ログアウトしました';
        return view('typingSite.index', [
            'logoutMsg' => $logoutMsg,
        ]);
    }
}
