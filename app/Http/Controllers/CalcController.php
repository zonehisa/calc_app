<?php

namespace App\Http\Controllers;

class CalcController extends Controller
{
    public function result($number1, $calclation, $number2)
    {
        $result = 0;
        switch ($calclation) {
            case 'addition':
                $result = $number1 + $number2;
                break;
            case 'subtraction':
                $result = $number1 - $number2;
                break;
            case 'multiplication':
                $result = $number1 * $number2;
                break;
            case 'division':
                $result = $number2 != 0 ? $number1 / $number2 : '0で割ろうとしていませんか？そんなことはやめましょうよ。考え直してください。';
                break;
            default:
                $result = '正しい計算方法を入れてくださいよ~。';
                break;
        }
        return view('calc', ['result' => $result]);
    }
}
