<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\User;
use Illuminate\Support\Facades\DB;
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
        $users = User::where('role_id', '!=', 1)->
        whereNotExists(function($query){
            $query->select(DB::raw(1))
                    ->from('lecturers')
                    ->whereRaw('lecturers.id_lecturer = users.id');
            })
            ->get();
        return view('lecturer.add', compact('lecturers','users'));
    }

    public function store(Request $request){
        $lecturers = new Lecturer ([
            'id_lecturer' => $request->input('lecturerSelect'),
            'address' => $request->input('address'),
            'telephone' => $request->input('telephone'),

        ]);
        $lecturers->save();
        \Session::flash('sukses','Data dosen berhasil ditambahkan');
        return redirect ()->route('lecturer.index');
    }

    public function update(Request $request){
        $lecturers = Lecturer::find($request->id_lecturer);
        $lecturers -> address = $request ->input ('address');
        $lecturers -> telephone = $request ->input ('telephone');
        $lecturers -> save();
        \Session::flash('sukses','Data dosen berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id_lecturer){
        $lecturers = Lecturer::find($id_lecturer)->delete();
        \Session::flash('sukses','Data dosen berhasil dihapus');
        return redirect()->back();
    }
}
