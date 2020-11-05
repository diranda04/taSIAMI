<?php

namespace App\Http\Controllers;

use App\CorrectionForm;
use App\Audit;

use PDF;
use Illuminate\Http\Request;

class CorrectionFormController extends Controller
{
    public function auditeeDevience($id_audit)
    {
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();
        return view ('auditee.devience', compact('correction_forms','id_audit'));
    }

    public function auditorDevience($id_audit){
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();
        return view ('auditor.devience', compact('correction_forms','id_audit'));
    }

    public function printPTK($id_audit)
    {
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();


        view()->share('correction_forms',$correction_forms);
        $pdf = PDF::loadview('ptk_print',['correction_forms'=> $correction_forms]);
        return $pdf->stream();
    }

    public function store(Request $request, $id_audit)
    {
        // dd($request->all());
        try {
            $correction_forms = CorrectionForm::create ([
                'id_correction_form' => $request->input('id_correction_form'),
                'audit_id' => $id_audit,
                'devience' => $request->input('devience'),
            ]);

            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request)
    {
        try {
            $correction_forms = CorrectionForm::find($request->id_correction_form);
            $correction_forms -> devience = $request ->input ('devience');
            $correction_forms -> causes = $request ->input ('causes');
            $correction_forms -> plan = $request ->input ('plan');
            $correction_forms -> save();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy(CorrectionForm $correctionForm)
    {
        //
    }
}
