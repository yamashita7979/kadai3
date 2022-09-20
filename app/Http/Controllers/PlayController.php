<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class PlayController extends Controller
{
    // 第1問目を表示する
    public function play(Request $request){

        // $request->session()->flush();

        // セッションのリセット（削除）
        if($request->session()->has('vals')){
            $request->session()->forget([
                "vals.0", "vals.1", "vals.2", "vals.3", "vals.4"
            ]);

            $request->session()->forget('count');
        }

        // ランダムで選んだ５トピックスをセッション保存しておく
        $topic = new Topic();
        $topics = $topic->randomFiveTopics();
        $request->session()->put('topics', $topics);

        $japanese_word = $topics[0]->japanese_word;
        $english_word = $topics[0]->english_word;

        return view('typingSite.play', [
            'japanese_word' => $japanese_word,
            'english_word' => $english_word,
            'judgment_flag' => '',
        ]);
    }

    // 入力された回答を保存、かつ、5問目の最後に結果一覧を表示させる
    public function submitTopic(Request $request)
    {
        $topics = $request->session()->get('topics');

        if($request->session()->has('count')){
            $count = $request->session()->get('count');
        }else{
            $count = 0;
        }
        $count++;
        // 何問目かをセッション保存する
        $request->session()->put('count', $count);

        $val = $request->input;
        // 回答（入力値）をセッションに追加していく
        $request->session()->push('vals', $val);

        $judgment_flag = $this->judge($val, $topics[$count-1]->english_word);
        // 正誤（回答結果）をセッション保存する
        $request->session()->push('judgment_flag', $judgment_flag);

        if($count > 0 && $count != 5){
            $japanese_word = $topics[$count]->japanese_word;
            $english_word = $topics[$count]->english_word;
        }

        // ５問目の場合は結果画面に遷移する
        if($count == 5){
            $vals = $request->session()->get('vals');
            $judgment_flag = $request->session()->get('judgment_flag');
            $results = array(
                "vals" => $vals,
                "judgment_flag" => $judgment_flag
            );
            return view('typingSite.result', [
                'results' => $results
            ]);
        }

        return view('typingSite.play', [
            'japanese_word' => $japanese_word,
            'english_word' => $english_word,
            'judgment_flag' => $judgment_flag
        ]);
    }

    // 入力値とお題が一致しているかを判別する
    // （不正解: 0, 正解: 1 を返す）
    public function judge($input, $english_topic)
    {
        if($input != $english_topic){
            return 0;
        }
        if($input == $english_topic){
            return 1;
        }
    }
}
