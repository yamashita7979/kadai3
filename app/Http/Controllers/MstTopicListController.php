<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class MstTopicListController extends Controller
{
    // DBからデータを得て、一覧を表示させる
    public function list(){
        $topics = Topic::all();
        return view('typingSite.mstTopicList', [
            'topics' => $topics,
        ]);
    }
}
