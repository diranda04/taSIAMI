<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index(){
        $faculties = Faculty::paginate(10);
        return view ('faculty.list', compact('faculties'));
    }

    public function store(Request $request){
        $faculties = new Faculty ([
            'name' => $request->input('name'),
        ]);
        $faculties -> save();
        \Session::flash('sukses','Fakultas berhasil ditambahkan');
        return redirect()->back();
    }


    public function update(Request $request)
    {
            $faculties = Faculty::find($request->id_faculty);
            $faculties -> name = $request ->input ('name'); 
            $faculties -> save();
            \Session::flash('sukses','Fakultas berhasil diubah');
            return redirect()->back();
    }

    public function destroy($id_faculty){
        $faculties = Faculty::find($id_faculty)->delete();
        \Session::flash('sukses','Fakultas berhasil hapus');
        return redirect()->back();
    }
}
