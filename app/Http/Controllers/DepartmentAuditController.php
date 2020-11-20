<?php

namespace App\Http\Controllers;

use App\DepartmentAudit;
use App\Auditor;
use App\Audit;
use Illuminate\Http\Request;

class DepartmentAuditController extends Controller
{
    public function index()
    {
        $department_audits = DepartmentAudit:: all();

        return view ('departmentAuditor.index', compact('department_audits'));
    }

    public function addDepartmentAudit(){

        $auditors = Auditor::where('status', 1)->get();
        $audits = Audit:: all();

        return view ('departmentAuditor.add', compact('auditors','audits'));
    }

    public function store(Request $request)
    {
        try {
            $department_audits = DepartmentAudit::create ([

                'auditor_id' => $request->input('auditorSelect'),
                'audit_id' => $request->input('auditSelect')
            ]);
            \Session::flash('sukses','Auditor prodi berhasil ditambahkan');
            return redirect ()->route('departmentAudit.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy($id_department_audit)
    {
        $department_audits = DepartmentAudit::find($id_department_audit)->delete();
        \Session::flash('sukses','Auditor prodi berhasil dihapus');
        return redirect()->back();
    }
}
