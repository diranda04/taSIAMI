<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::paginate(10);
        return view ('faculty.list', compact('faculties'));
    }

    public function store(Request $request)
    {
        try {
            $faculties = new Faculty ([
                'id_faculty' => $request->input('id_faculty'),
                'name' => $request->input('name'),

            ]);
            $faculties -> save();
            return redirect()->back()->with('message', 'Fakultas berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request)
    {
        try {
            $faculties = Faculty::find($request->id_faculty);
            $faculties -> name = $request ->input ('name');
            $faculties -> save();
            return redirect()->back()->with('message', 'Fakultas berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id_faculty)
    {
        $faculties = Faculty::find($id_faculty)->delete();
        return redirect()->back()->with('message', 'Fakultas berhasil dihapus');
    }
}
