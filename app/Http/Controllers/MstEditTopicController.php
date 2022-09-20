<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class MstEditTopicController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // 編集項目選択画面の表示
    public function edit(){
        if(!Auth::check()){
            return view('/typingSite/login');
        }

        $topics = Topic::all();
        return view('typingSite.mstEditTopic', [
            'topics' => $topics,
        ]);
    }

    // 編集画面の表示
    public function editDisplay(Request $request)
    {
        $topic = Topic::find($request->topic_id);

        if(!$topic){
            return redirect('/typingSite/mst/edit');
        }

        return view('typingSite.mstEditDisplay', [
            'form' => $topic,
        ]);
    }

    public function update(Request $request)
    {
        $topic = Topic::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $topic->fill($form)->save();
        return redirect('/typingSite/mst/edit');
    }
}
