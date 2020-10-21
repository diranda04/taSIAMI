<?php

namespace App\Http\Controllers;

use App\Auditee;
use App\Lecturer;
use App\User;
use App\Department;
use Illuminate\Http\Request;

class AuditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $auditees = Auditee::all();
        $lecturers = Lecturer::all();
        $users = User::all();
        $departments = Department::all();
        return view('auditee.index', compact('auditees','lecturers','users','departments'));
    }

    public function addAuditee(){
        $auditees = Auditee::all();
        $lecturers = Lecturer::all();
        $users = User::all();
        $departments = Department::all();
        return view('auditee.add', compact('auditees','lecturers','users','departments'));
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
            $auditees = new Auditee ([
                'id_auditee' => $request->input('id_auditee'),
                'lecturer_id' => $request->input('lecturerSelect'),
                'department_id' => $request->input('departmentSelect'),
                'start_at' => $request->input('start_at'),
                'end_at' => $request->input('end_at'),

            ]);
            $auditees->save();
            return redirect ()->route('auditee.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auditee  $auditee
     * @return \Illuminate\Http\Response
     */
    public function show(Auditee $auditee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auditee  $auditee
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditee $auditee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auditee  $auditee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auditee $auditee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auditee  $auditee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_auditee)
    {
        $auditees = Auditee::find($id_auditee)->delete();
        return redirect()->back();
    }
}
