<?php

namespace App\Http\Controllers;

use App\Auditor;
use App\User;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $auditors = Auditor::all();
        $users = User::all();
        return view('auditor.index', compact('auditors','users'));
    }

    public function addAuditor(){
        $auditors = Auditor::all();
        $users = User::all();
        return view('auditor.add', compact('auditors','users'));
    }

    public function changeStatus(Request $request)
    {
    	\Log::info($request->all());
        $auditor = Auditor::find($request->id_auditor);
        $auditor->status = $request->status;
        $auditor->save();

        return response()->json(['success'=>'Status change successfully.']);
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
            $auditors = new auditor ([
                'id_auditor' => $request->input('auditorSelect'),
                'status' => $request->input('status'),
                'start_at' => $request->input('start_at'),

            ]);
            $auditors->save();
            return redirect ()->route('auditor.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function show(Auditor $auditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditor $auditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auditor $auditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_auditor)
    {
        $auditors = Auditor::find($id_auditor)->delete();
        return redirect()->back();
    }
}
