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
        $auditors = Auditor:: all();
        $audits = Audit:: all();
        return view ('departmentAuditor.index', compact('department_audits','auditors','audits'));
    }

    public function addDepartmentAudit(){
        $department_audits = DepartmentAudit:: all();
        $auditors = Auditor:: all();
        $audits = Audit:: all();
        return view ('departmentAuditor.add', compact('department_audits','auditors','audits'));
    }

    public function store(Request $request)
    {
        try {
            $department_audits = DepartmentAudit::create ([
                'id_department_audit' => $request->input('id_department_audit'),
                'auditor_id' => $request->input('auditorSelect'),
                'audit_id' => $request->input('auditSelect')
            ]);

            return redirect ()->route('departmentAudit.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy($id_department_audit)
    {
        $department_audits = DepartmentAudit::find($id_department_audit)->delete();
        return redirect()->back();
    }
}
