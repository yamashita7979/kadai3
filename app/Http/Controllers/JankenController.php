<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JankenController extends Controller
{
    // ホーム画面を表示する
    public function index()
    {
        return view('janken.start');
    }

    // プレーヤーとCPUの出す手、勝敗メッセージを返す
    public function result(Request $request)
    {
        // ラジオボタンが未選択の場合は遷移しない
        if($request->get('hand') == ''){
            return view('janken.start');
        }

        $myHand = $request->get('hand');
        $cpuHand = rand(0, 2);
        $resultMsg = $this->makeMessage($myHand, $cpuHand);
        $param = [
            'myHand' => $myHand,
            'cpuHand' => $cpuHand,
            'resultMsg' => $resultMsg,
        ];

        return view('janken.end', [
            'param' => $param
        ]);
    }

    // 出す手によって、勝敗メッセージを決める
    private function makeMessage($myHand, $cpuHand)
    {
        $winMsg = 'あなたの勝ち！';
        $loseMsg = 'あなたの負け...';
        $drawMsg = 'あいこです';

        // グー:0, チョキ:1, パー:2
        if($myHand == 0 && $cpuHand == 1){
            return $winMsg;
        }elseif($myHand == 0 && $cpuHand == 2){
            return $loseMsg;
        }elseif($myHand == 1 && $cpuHand == 0){
            return $loseMsg;
        }elseif($myHand == 1 && $cpuHand == 2){
            return $winMsg;
        }elseif($myHand == 2 && $cpuHand == 0){
            return $winMsg;
        }elseif($myHand == 2 && $cpuHand == 1){
            return $loseMsg;
        }else{
            return $drawMsg;
        }
    }

    // ホーム画面に戻る
    public function again()
    {
        return view('janken.start');
    }
}
