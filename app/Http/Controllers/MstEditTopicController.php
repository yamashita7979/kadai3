<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class MstEditTopicController extends Controller
{
    public function edit(){
        $topics = Topic::all();
        return view('typingSite.mstEditTopic', [
            'topics' => $topics,
        ]);
    }
}
