<?php

namespace App\Http\Controllers;

use App\AuditInstrument;
use App\Standard;
use App\Periode;
use Illuminate\Http\Request;

class AuditInstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audit_instruments = AuditInstrument:: all();
        $standards = Standard:: all();
        $periodes = Periode:: all();
        return view ('instrument.index', compact('audit_instruments','standards','periodes'));
    }

    public function addPs(){
        $audit_instruments = AuditInstrument:: all();
        $standards = Standard:: all();
        $periodes = Periode:: all();
        return view ('instrument.add', compact('audit_instruments','standards','periodes'));
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
            $audit_instruments = AuditInstrument::create ([
                'standard_id' => $request->input('standardSelect'),
                'periode_id' => $request->input('periodeSelect')
            ]);
            $audit_instruments->save();
            return redirect ()->route('instrument.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuditInstrument  $auditInstrument
     * @return \Illuminate\Http\Response
     */
    public function show(AuditInstrument $auditInstrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuditInstrument  $auditInstrument
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditInstrument $auditInstrument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuditInstrument  $auditInstrument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditInstrument $auditInstrument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuditInstrument  $auditInstrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditInstrument $auditInstrument)
    {
        //
    }
}
