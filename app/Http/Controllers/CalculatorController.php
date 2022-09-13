<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {
        $result = '';
        // 各セッション変数を初期化する
        if($request->session()->get('num1') == null){
            $request->session()->put('num1', '');
        }
        if($request->session()->get('num2') == null){
            $request->session()->put('num2', '');
        }
        if($request->session()->get('ope') == null){
            $request->session()->put('ope', '');
        }

        return view('calculator.index', [
            'result' => $result,
        ]);
    }

    public function calculate(Request $request)
    {
        // 利用するセッション変数（num1, num2, ope）

        $result = '';
        if($request->session()->get('num1') == null){
            $request->session()->put('num1', '');
        }
        if($request->session()->get('num2') == null){
            $request->session()->put('num2', '');
        }
        if($request->session()->get('ope') == null){
            $request->session()->put('ope', '');
        }

        // 'AE'ボタンクリック時
        if($request->get('clear')){
            $request->session()->put('num1', '');
            $request->session()->put('num2', '');
            $request->session()->put('ope', '');
            return view('calculator.index', [
                'result' => $result,
            ]);
        }

        // '＝'ボタンクリック時
        if($request->get('equal') && $request->session()->get('ope')
            && $request->session()->get('num1') && $request->session()->get('num2')){

            $num1_ses = $request->session()->get('num1');
            $num2_ses = $request->session()->get('num2');
            $ope_ses = $request->session()->get('ope');
            if($ope_ses == '+'){
                $result =  intval($num1_ses) + intval($num2_ses);
            }elseif($ope_ses == '-'){
                $result =  intval($num1_ses) - intval($num2_ses);
            }elseif($ope_ses == '÷'){
                $result =  intval($num1_ses) / intval($num2_ses);
            }elseif($ope_ses == '×'){
                $result =  intval($num1_ses) * intval($num2_ses);
            }

            // セッション変数をリセット
            $request->session()->put('num1', '');
            $request->session()->put('num2', '');
            $request->session()->put('ope', '');

            return view('calculator.index', [
                'result' => $result,
            ]);
        }

        // 最初の数字を入力する場合
        if($request->get('num') && $request->session()->get('num1') == ''
            && $request->session()->get('ope') == '' && $request->session()->get('num2') == ''){

            $num_post = $request->get('num');
            $request->session()->put('num1', $num_post);
            return view('calculator.index', [
                'result' => $num_post,
            ]);
        }

        // 連続して数字が入力される場合
        if($request->get('num') && $request->session()->get('num1') != ''
            && $request->session()->get('ope') == '' && $request->session()->get('num2') == ''){

            $num_post = $request->get('num');

            // num1に入力される
            if($request->session()->get('num2') == ''){
                $request->session()->put('num1', $num_post);
                return view('calculator.index', [
                    'result' => $request->session()->get('num1'),
                ]);
            }
            // num2に入力される
            if($request->session()->get('num2') != ''){
                $request->session()->put('num2', $num_post);
                return view('calculator.index', [
                    'result' => $request->session()->get('num2'),
                ]);
            }
        }

        // 演算子を入力する場合
        if($request->get('ope') && $request->session()->get('num1') != ''
            && $request->session()->get('num2') == ''){

            $ope_post = $request->get('ope');
            $request->session()->put('ope', $ope_post);
            return view('calculator.index', [
                'result' => $ope_post,
            ]);
        }

        // 複数回数演算する場合
        if($request->get('ope') && $request->session()->get('num1') != ''
            && $request->session()->get('ope') != ''){

            $ope_post = $request->get('ope');
            $request->session()->put('ope', $ope_post);

            $num1_ses = $request->session()->get('num1');
            $num2_ses = $request->session()->get('num2');
            $ope_ses = $request->session()->get('ope');
            if($ope_ses == '+'){
                $result_temp =  intval($num1_ses) + intval($num2_ses);
            }elseif($ope_ses == '-'){
                $result_temp =  intval($num1_ses) - intval($num2_ses);
            }elseif($ope_ses == '÷'){
                $result_temp =  intval($num1_ses) / intval($num2_ses);
            }elseif($ope_ses == '×'){
                $result_temp =  intval($num1_ses) * intval($num2_ses);
            }
            
            $request->session()->put('num1', $result_temp);
            $request->session()->put('num2', '');

            return view('calculator.index', [
                'result' => $ope_ses,
            ]);
        }

        // 演算する場合
        if($request->get('num') && $request->session()->get('num1') != ''
            && $request->session()->get('ope') != '' && $request->session()->get('num2') != ''){

            $num_post = $request->get('num');
            $request->session()->put('num2', $num_post);

            $num1_ses = $request->session()->get('num1');
            $num2_ses = $request->session()->get('num2');
            $ope_ses = $request->session()->get('ope');
            if($ope_ses == '+'){
                $result_temp =  intval($num1_ses) + intval($num2_ses);
            }elseif($ope_ses == '-'){
                $result_temp =  intval($num1_ses) - intval($num2_ses);
            }elseif($ope_ses == '÷'){
                $result_temp =  intval($num1_ses) / intval($num2_ses);
            }elseif($ope_ses == '×'){
                $result_temp =  intval($num1_ses) * intval($num2_ses);
            }
    
            $request->session()->put('num1', $result_temp);
            $request->session()->put('num2', '');
            return view('calculator.index', [
                'result' => $result_temp,
            ]);    
        }

        // 2つ目の数字を入力する場合
        if($request->get('num') && $request->session()->get('num1') != ''
            && $request->session()->get('ope') != '' && $request->session()->get('num2') == ''){
        
            // num2を表示させる
            $num_post = $request->get('num');
            $request->session()->put('num2', $num_post);
            return view('calculator.index', [
                'result' => $request->session()->get('num2'),
            ]); 
        }

        // 数字が未入力の状態で、演算子が入力される場合
        if($request->get('ope') && $request->session()->get('num1') == ''){
            $ope_post = $request->get('ope');
            $request->session()->put('ope', $ope_post);
            return view('calculator.index', [
                'result' => $ope_post,
            ]);
        }

        // 連続で演算子が入力される場合
        if($request->get('ope') && $request->session()->get('ope')){
            $ope_post = $request->get('ope');
            $request->session()->put('ope', $ope_post);
            return view('calculator.index', [
                'result' => $request->session()->get('ope'),
            ]);
        }    
    }
}
