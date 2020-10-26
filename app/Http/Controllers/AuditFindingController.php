<?php

namespace App\Http\Controllers;

use App\AuditFinding;
use App\Audit;
use Illuminate\Http\Request;

class AuditFindingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_audit)
    {
        $audit_findings = AuditFinding::where('audit_id',$id_audit)->get();
        return view ('auditee.finding', compact('audit_findings','id_audit'));
    }



    public function detailFinding($id_audit){
        $audit_findings = AuditFinding::where('audit_id',$id_audit)->get();
        return view ('auditor.finding', compact('audit_findings','id_audit'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\AuditFinding  $auditFinding
     * @return \Illuminate\Http\Response
     */
    public function show(AuditFinding $auditFinding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuditFinding  $auditFinding
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditFinding $auditFinding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuditFinding  $auditFinding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditFinding $auditFinding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuditFinding  $auditFinding
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditFinding $auditFinding)
    {
        //
    }
}
