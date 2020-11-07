<?php

namespace App\Http\Controllers;

use App\AuditFinding;
use App\Audit;
use App\DepartmentAudit;
use App\Department;
use Illuminate\Http\Request;
use PDF;

class AuditFindingController extends Controller
{
    public function index($id_audit)
    {
        $audit_findings = AuditFinding::where('audit_id',$id_audit)->get();
        return view ('auditee.finding', compact('audit_findings','id_audit'));
    }

    public function detailFinding($id_audit){
        $audit_findings = AuditFinding::where('audit_id',$id_audit)->get();
        return view ('auditor.finding', compact('audit_findings','id_audit'));
    }



    public function printFinding($id_audit){

        $audit_findings = AuditFinding::where('audit_id',$id_audit)->get();
        $auditors = DepartmentAudit::join("auditors", "department_audits.auditor_id", "=","auditors.id_auditor")->
        join("audits", "department_audits.audit_id", "=", "audits.id_audit")->
        join("users", "auditors.id_auditor", "=", "users.id")->
        join("departments", "audits.department_id","=", "departments.id_department")->
        where('audit_id',$id_audit)->get();
        $auditees = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        ->leftJoin('auditees', 'auditees.department_id', '=', 'departments.id_department')
        ->leftJoin('lecturers', 'lecturers.id_lecturer', '=', 'auditees.lecturer_id')
        ->leftJoin("users", "lecturers.id_lecturer", "=", "users.id")
        ->where('id_audit',$id_audit)->first();

        view()->share('audit_findings',$audit_findings);
        $pdf = PDF::loadview('audit.temuan_print', compact('audit_findings', 'auditors', 'auditees'));
        return $pdf->stream();
    }


    public function store(Request $request, $id_audit)
    {
        try {
            $audit_findings = new AuditFinding ([
                'id_audit_finding' => $request->input('id_audit_finding'),
                'audit_id' => $id_audit,
                'desc' => $request->input('desc'),

            ]);
            $audit_findings->save();
            return redirect()->back()->with('message', 'Temuan audit berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy(AuditFinding $auditFinding)
    {
        //
    }
}
