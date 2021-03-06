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
        $users = User::where('role_id', '=', 4)->get();
        $faculties = Faculty::all();
        return view('dean.index', compact('deans','users','faculties'));
    }

    public function store(Request $request){
        $deans = new Dean ([
            'user_id' => $request->input('userSelect'),
            'faculty_id' => $request->input('facultySelect'),
            'start_at' => $request->input('start_at'),
            'end_at' => $request->input('end_at'),
        ]);
        $deans->save();
        \Session::flash('sukses','Dekan berhasil ditambahkan');
        return redirect ()->route('dean.index');
    }


    public function update(Request $request)
    {
        $deans = Dean::find($request->id_dean );

        $deans -> user_id = $request ->input ('userSelect');
        $deans -> faculty_id= $request -> input('facultySelect');
        $deans -> start_at = $request -> input('start_at');
        $deans -> end_at = $request -> input('end_at');
        $deans -> save();
        \Session::flash('sukses','Fakultas berhasil diubah');
        return redirect()->back();
    }


    // public function update(Request $request){
    //     $deans = Dean::where('id_dean',$request->id_dean)->update([
    //         "start_at"    => $request ->input ('start_at'),
    //         "end_at"      => $request ->input ('end_at'),
    //     ]);
    //         dd($deans);
    //         \Session::flash('sukses','Status Dekan berhasil diubah');
    //         return redirect()->back();

    // }

    public function destroy($id_dean){
        $deans = Dean::find($id_dean)->delete();
        \Session::flash('sukses','Dekan berhasil dihapus');
        return redirect()->back();
    }
}
