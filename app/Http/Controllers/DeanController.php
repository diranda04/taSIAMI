<?php

namespace App\Http\Controllers;

use App\Dean;
use App\Lecturer;
use App\User;
use App\Faculty;
use Illuminate\Http\Request;

class DeanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Dean  $dean
     * @return \Illuminate\Http\Response
     */
    public function show(Dean $dean)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dean  $dean
     * @return \Illuminate\Http\Response
     */
    public function edit(Dean $dean)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dean  $dean
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dean $dean)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dean  $dean
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dean)
    {
        $deans = Dean::find($id_dean)->delete();
        return redirect()->back()->with('message', 'Dekan berhasil dihapus');
    }
}
