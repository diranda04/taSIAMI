<?php

namespace App\Http\Controllers;

use App\DepartmentAudit;
use App\Auditor;
use App\Audit;
use Illuminate\Http\Request;

class DepartmentAuditController extends Controller
{
    public function index(){
        $department_audits = DepartmentAudit:: all();
        $auditors = Auditor::where('status', 1)->get();
        $audits = Audit:: all();
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

    public function destroy($id_department_audit){
        $department_audits = DepartmentAudit::find($id_department_audit)->delete();
        \Session::flash('sukses','Auditor prodi berhasil dihapus');
        return redirect()->back();
    }
}
