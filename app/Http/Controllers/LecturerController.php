<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\User;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index(){
        $lecturers = Lecturer::paginate(5);
        $users = User::all();
        return view('lecturer.index', compact('lecturers','users'));
    }

    public function addlecturer(){
        $lecturers = Lecturer::all();
        $users = User::all();
        return view('lecturer.add', compact('lecturers','users'));
    }

    public function store(Request $request)
    {
        try {
            $lecturers = new Lecturer ([
                'id_lecturer' => $request->input('lecturerSelect'),
                'address' => $request->input('address'),
                'telephone' => $request->input('telephone'),

            ]);
            $lecturers->save();
            return redirect ()->route('lecturer.index')->with('message', 'Berhasil menambahkan dosen');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id_lecturer)
    {
        $lecturers = Lecturer::find($id_lecturer)->delete();
        return redirect()->back()->with('message', 'Dosen berhasil dihapus');
    }
}
