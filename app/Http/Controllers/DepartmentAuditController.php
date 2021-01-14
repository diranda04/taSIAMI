<?php

namespace App\Http\Controllers;

use App\DepartmentAudit;
use App\Auditor;
use App\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DepartmentAuditController extends Controller
{
    public function index(){
        $department_audits = DepartmentAudit:: orderBy('audit_id', 'asc')->get();
        $auditors = Auditor::where('status', 1)->get();
        $audits = Audit::join("periodes", "audits.periode_id", "=", "periodes.id_periode")
        ->whereYear('audit_end_at', '=', Carbon::now()->format('Y'))->get();

        return view ('departmentAuditor.index', compact('department_audits','auditors','audits'));
    }


    public function store(Request $request){
        $department_audits = DepartmentAudit::create ([
            'auditor_id' => $request->input('auditorSelect'),
            'audit_id' => $request->input('auditSelect')
        ]);
        \Session::flash('sukses','Auditor prodi berhasil ditambahkan');
        return redirect ()->route('departmentAudit.index');
    }

    public function update(Request $request){
        $department_audits = DepartmentAudit::find($request->id_department_audit);
        $department_audits -> auditor_id    = $request ->input ('auditorselect');
        $department_audits -> audit_id      = $request ->input ('auditselect');
        $department_audits -> save();

        \Session::flash('sukses','Penempatan auditor berhasil diubah');
        return redirect()->back();

    }

    public function destroy($id_department_audit){
        $department_audits = DepartmentAudit::find($id_department_audit)->delete();
        \Session::flash('sukses','Auditor prodi berhasil dihapus');
        return redirect()->back();
    }
}
