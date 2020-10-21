<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Department;
use App\DepartmentAudit;
use App\Lecturer;
use App\Periode;
use App\Auditee;
use Auth;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audits = Audit:: all();
        $periodes = Periode:: all();
        $departments = Department:: all();
        return view ('audit.index', compact('audits','periodes','departments'));
    }

    public function addAudit(){
        $audits = Audit:: all();
        $periodes = Periode:: all();
        $departments = Department:: all();
        return view ('audit.add', compact('audits','periodes','departments'));
    }

    public function prodiAudit(){
        $auditors = Auth::getuser()->auditor->departmentAudit;
        return view ('auditor.audit_prodi', compact('auditors'));
    }

    public function lihatAuditProdi(){
        $auditees = Auth::getuser()->lecturer->auditee;
        return view ('auditee.audit_prodi', compact('auditees'));
    }
    public function beritaAcara(){
        $audits = Audit:: all();
        $departments = Department:: all();
        $lecturers = Lecturer:: all();
        $auditees = Auditee:: all();
        return view ('berita_acara', compact('audits','departments', 'lecturers', 'auditees'));
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
            $audits = Audit::create ([
                'id_audit' => $request->input('id_audit'),
                'periode_id' => $request->input('periodeSelect'),
                'department_id' => $request->input('prodiSelect')
            ]);
            $audits->save();
            return redirect ()->route('audit.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function edit(Audit $audit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audit $audit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_audit)
    {
        $audits = Audit::find($id_audit)->delete();
        return redirect()->back();
    }
}
