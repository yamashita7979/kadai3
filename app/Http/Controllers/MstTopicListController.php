<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class MstTopicListController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // DBからデータを得て、一覧を表示させる
    public function list(Request $request){
        if(!Auth::check()){
            return view('/typingSite/login');
        }

        $topics = Topic::paginate(5);
        return view('typingSite.mstTopicList', [
            'topics' => $topics,
        ]);
    }
}
