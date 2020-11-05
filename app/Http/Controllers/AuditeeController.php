<?php

namespace App\Http\Controllers;

use App\Auditee;
use App\Lecturer;
use App\User;
use App\Department;
use Illuminate\Http\Request;

class AuditeeController extends Controller
{
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

    public function destroy($id_auditee)
    {
        $auditees = Auditee::find($id_auditee)->delete();
        return redirect()->back();
    }
}
