<?php

namespace App\Http\Controllers;

use App\DepartmentAudit;
use App\Auditor;
use App\Audit;
use Illuminate\Http\Request;

class DepartmentAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\DepartmentAudit  $departmentAudit
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentAudit $departmentAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DepartmentAudit  $departmentAudit
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentAudit $departmentAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DepartmentAudit  $departmentAudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentAudit $departmentAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DepartmentAudit  $departmentAudit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_department_audit)
    {
        $department_audits = DepartmentAudit::find($id_department_audit)->delete();
        return redirect()->back();
    }
}
