<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class MstTopicListController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // DBからデータを得て、一覧を表示させる
    public function list(){
        if(!Auth::check()){
            return view('/typingSite/login');
        }

        $topics = Topic::all();
        return view('typingSite.mstTopicList', [
            'topics' => $topics,
        ]);
    }
}
