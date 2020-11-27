<?php

namespace App\Http\Controllers;

use App\Dean;
use App\Lecturer;
use App\User;
use App\Faculty;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeanController extends Controller
{
    public function index(){
        $deans = Dean::orderBy('start_at', 'desc')->get();
        $lecturers = Lecturer::leftJoin('users', 'users.id', '=', 'lecturers.id_lecturer')
        ->where('role_id', '=', 4)->get();
        $faculties = Faculty::all();
        return view('dean.index', compact('deans','lecturers','faculties'));
    }

    public function store(Request $request){
        $deans = new Dean ([
            'lecturer_id' => $request->input('lecturerSelect'),
            'faculty_id' => $request->input('facultySelect'),
            'start_at' => $request->input('start_at'),
            'end_at' => $request->input('end_at'),
        ]);
        $deans->save();
        \Session::flash('sukses','Dekan berhasil ditambahkan');
        return redirect ()->route('dean.index');
    }

    public function destroy($id_dean){
        $deans = Dean::find($id_dean)->delete();
        \Session::flash('sukses','Dekan berhasil dihapus');
        return redirect()->back();
    }
}
