<?php

namespace App\Http\Controllers;

use App\CorrectionForm;
use App\Audit;
use App\Department;
use PDF;
use Illuminate\Http\Request;

class CorrectionFormController extends Controller
{
    public function auditeeDevience($id_audit){
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();
        return view ('auditee.devience', compact('correction_forms','id_audit'));
    }

    public function auditorDevience($id_audit){
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();
        return view ('auditor.devience', compact('correction_forms','id_audit'));
    }

    public function printPTK($id_audit){
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();
        $departments = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        ->leftJoin('faculties', 'faculties.id_faculty', '=', 'departments.faculty_id')
        ->where('id_audit',$id_audit)->first();
        // dd($departments);
        view()->share('correction_forms',$correction_forms);
        $pdf = PDF::loadview('ptk_print',['correction_forms'=> $correction_forms, 'departments'=>$departments]);
        return $pdf->stream();
    }

    public function viewPTK($id_audit){
        $correction_forms = CorrectionForm::where('audit_id',$id_audit)->get();
        $departments = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        ->leftJoin('faculties', 'faculties.id_faculty', '=', 'departments.faculty_id')
        ->where('id_audit',$id_audit)->first();
        // dd($departments);
        view()->share('correction_forms',$correction_forms);
        $pdf = PDF::loadview('ptk_print',['correction_forms'=> $correction_forms, 'departments'=>$departments]);
        return $pdf->stream();
    }

    public function store(Request $request, $id_audit)
    {
        $correction_forms = CorrectionForm::create ([
            'audit_id' => $id_audit,
            'devience' => $request->input('devience'),
        ]);
        \Session::flash('sukses','Keadaan menyimpang berhasil ditambahkan');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $correction_forms = CorrectionForm::find($request->id_correction_form);
        $correction_forms -> causes = $request ->input ('causes');
        $correction_forms -> plan = $request ->input ('plan');
        $correction_forms -> save();
        \Session::flash('sukses','Permintaan tindakan koreksi berhasil diisi');
        return redirect()->back();
    }

    public function destroy($id_correction_form){
        $correction_forms = CorrectionForm::find($id_correction_form)->delete();
        \Session::flash('sukses','Keadaan menyimpang berhasil dihapus');
        return redirect()->back();
    }
}
