<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PrintChartController extends Controller
{
    public function preview()
    {
        return view('chart.test');
    }

    public function print(Request $request){

        $data = $request->chartData;
    	$pdf = PDF::loadView('chart.temp',compact('data'));
        // return $pdf->download('charts.pdf');
        return $pdf->stream();
    }
}

