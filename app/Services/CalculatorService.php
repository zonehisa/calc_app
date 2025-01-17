<?php

namespace App\Services;

class CalculatorService
{
    public function calculate($number1, $calculation, $number2)
    {
        switch ($calculation) {
            case 'addition':
                return $number1 + $number2;
            case 'subtraction':
                return $number1 - $number2;
            case 'multiplication':
                return $number1 * $number2;
            case 'division':
                return $number2 != 0 ? $number1 / $number2 : '0で割ることはできません。';
            default:
                return '正しい計算方法を選択してください。';
        }
    }
}
