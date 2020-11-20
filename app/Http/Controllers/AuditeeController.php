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
        return view('auditee.index', compact('auditees'));
    }

    public function addAuditee(){
        $lecturers = Lecturer::leftJoin('users', 'users.id', '=', 'lecturers.id_lecturer')->
        where('role_id', '=', 3)->get(); 
        $departments = Department::all();
        return view('auditee.add', compact('lecturers','departments'));
    }

    public function store(Request $request)
    {
            $auditees = new Auditee ([

                'lecturer_id' => $request->input('lecturerSelect'),
                'department_id' => $request->input('departmentSelect'),
                'start_at' => $request->input('start_at'),
                'end_at' => $request->input('end_at'),

            ]);
            $auditees->save();
            \Session::flash('sukses','Ketua Jurusan berhasil ditambahkan');
            return redirect ()->route('auditee.index');

    }

    public function destroy($id_auditee)
    {
        $auditees = Auditee::find($id_auditee)->delete();
        \Session::flash('sukses','Ketua Jurusan berhasil dihapus');
        return redirect()->back();
    }
}
