<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;

class PrintChartController extends Controller
{
    public function preview()
    {
        return view('audit.chart');
    }

    public function download()
    {
        $render = view('audit.chart')->render();

        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report.pdf'));

        // if (!$pdf->send()) {
        //     $error = $pdf->getError();
        //     // ... handle error here
        // }

        // $content = $pdf->toString();
        // return $pdf->stream();
        return response()->download(public_path('report.pdf'));
    }
}

