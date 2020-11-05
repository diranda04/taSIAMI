<?php

namespace App\Http\Controllers;

use App\Dean;
use App\Lecturer;
use App\User;
use App\Faculty;
use Illuminate\Http\Request;

class DeanController extends Controller
{
    public function index(){
        $deans = Dean::all();
        $lecturers = Lecturer::all();
        $users = User::all();
        $faculties = Faculty::all();
        return view('dean.index', compact('deans','lecturers','users','faculties'));
    }

    public function addDean(){
        $deans = Dean::all();
        $lecturers = Lecturer::all();
        $users = User::all();
        $faculties = Faculty::all();
        return view('dean.add', compact('deans','lecturers','users','faculties'));
    }

    public function store(Request $request)
    {
        try {
            $deans = new Dean ([
                'id_dean' => $request->input('id_dean'),
                'lecturer_id' => $request->input('lecturerSelect'),
                'faculty_id' => $request->input('facultySelect'),
                'start_at' => $request->input('start_at'),
                'end_at' => $request->input('end_at'),

            ]);
            $deans->save();
            return redirect ()->route('dean.index')->with('message', 'Dekan berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id_dean)
    {
        $deans = Dean::find($id_dean)->delete();
        return redirect()->back()->with('message', 'Dekan berhasil dihapus');
    }
}
