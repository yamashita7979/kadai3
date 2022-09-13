<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {
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

        return view('calculator.index', [
            'result' => $result,
        ]);
    }

    public function calculate(Request $request)
    {
        // num1: num1が'',かつ num2が''の場合に使われる
        // num2: num1が''でない, かつ num2が''の場合に使われる

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

        // セッション保存すべき値は３つ要る

        if($request->get('clear')){
            $request->session()->put('num1', '');
            $request->session()->put('num2', '');
            $request->session()->put('ope', '');
            return view('calculator.index', [
                'result' => $result,
            ]);
        }

        // valueが=なら（計算する）
        if($request->get('equal') && $request->session()->get('ope')
            && $request->session()->get('num1') && $request->session()->get('num2')){

            $ses_num1 = $request->session()->get('num1');
            $ses_num2 = $request->session()->get('num2');
            $ses_ope = $request->session()->get('ope');
            if($ses_ope == '+'){
                $result =  intval($ses_num1) + intval($ses_num2);
            }elseif($ses_ope == '-'){
                $result =  intval($ses_num1) - intval($ses_num2);
            }elseif($ses_ope == '÷'){
                $result =  intval($ses_num1) / intval($ses_num2);
            }elseif($ses_ope == '×'){
                $result =  intval($ses_num1) * intval($ses_num2);
            }

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
        if($request->get('num') && $request->session()->get('num1') == ''
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
            if($request->session()->get('') != ''){
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

        // 複数回演算する場合
        if($request->get('ope') && $request->session()->get('num1') != ''
        && $request->session()->get('ope') != ''
        //  \&& $request->session()->get('num2') != ''
         ){
            $ope_post = $request->get('ope');
            $request->session()->put('ope', $ope_post);

            $ses_num1 = $request->session()->get('num1');
            $ses_num2 = $request->session()->get('num2');
            $ses_ope = $request->session()->get('ope');

            if($ses_ope == '+'){
                $result_temp =  intval($ses_num1) + intval($ses_num2);
            }elseif($ses_ope == '-'){
                $result_temp =  intval($ses_num1) - intval($ses_num2);
            }elseif($ses_ope == '÷'){
                $result_temp =  intval($ses_num1) / intval($ses_num2);
            }elseif($ses_ope == '×'){
                $result_temp =  intval($ses_num1) * intval($ses_num2);
            }
            
            $request->session()->put('num1', $result_temp);
            $request->session()->put('num2', '');

            return view('calculator.index', [
                'result' => $ses_ope,
            ]);
        }

        // 演算される場合
        if($request->get('num') && $request->session()->get('num1') != ''
            && $request->session()->get('ope') != '' && $request->session()->get('num2') != ''){

                $num_post = $request->get('num');
                $request->session()->put('num2', $num_post);

                // 以下は未完成、num1とnum2で演算した結果を表示させたい
                $ses_num1 = $request->session()->get('num1');
                $ses_num2 = $request->session()->get('num2');
                $ses_ope = $request->session()->get('ope');
                if($ses_ope == '+'){
                    $result_temp =  intval($ses_num1) + intval($ses_num2);
                }elseif($ses_ope == '-'){
                    $result_temp =  intval($ses_num1) - intval($ses_num2);
                }elseif($ses_ope == '÷'){
                    $result_temp =  intval($ses_num1) / intval($ses_num2);
                }elseif($ses_ope == '×'){
                    $result_temp =  intval($ses_num1) * intval($ses_num2);
                }
        
                $request->session()->put('num1', $result_temp);
                $request->session()->put('num2', '');
                return view('calculator.index', [
                    'result' => $result_temp,
                    // 'result' => '演算される場合を表示した',
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

        return view('calculator.index', [
            'result' => 'とりあえず表示',
        ]);    
}
}
