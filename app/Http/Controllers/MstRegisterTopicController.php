<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class MstRegisterTopicController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function register(Request $request){
        if(!Auth::check()){
            return view('/typingSite/login');
        }
        $user = Auth::user();
        return view('typingSite.mstRegisterTopic', [
            'user' => $user,
        ]);
    }

    public function create(Request $request)
    {
        //　DBに登録
        $topic = new Topic();
        $form = $request->all();
        unset($form['_token']);
        $topic->fill($form)->save();

        return redirect('/typingSite/mst/list');
    }
}
