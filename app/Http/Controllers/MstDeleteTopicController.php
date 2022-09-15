<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class MstDeleteTopicController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function delete(){
        if(!Auth::check()){
            return view('/typingSite/login');
        }

        $topics = Topic::all();
        return view('typingSite.mstDeleteTopic', [
            'topics' => $topics,  
        ]);
    }

    public function remove(Request $request)
    {
        Topic::destroy($request->topic_id);
        return redirect('/typingSite/mst/delete');
    }
}
