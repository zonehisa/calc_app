<?php

namespace App\Http\Controllers;

use App\Services\CalculatorService;
use Illuminate\Http\Request;

class CalcController extends Controller
{
    protected $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function showForm()
    {
        return view('calc');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'calculation' => 'required|in:addition,subtraction,multiplication,division',
        ]);

        $number1 = $request->input('number1');
        $calculation = $request->input('calculation');
        $number2 = $request->input('number2');

        $result = $this->calculatorService->calculate($number1, $calculation, $number2);

        return response()->json(['result' => $result]);
    }
}
