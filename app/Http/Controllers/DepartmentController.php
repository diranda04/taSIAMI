<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department:: all();
        return view ('department.list', compact('departments'));
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
    public function store(Request $request, $id_faculty)
    {
        try {
            $departments = new Department ([
                'id_department' => $request->input('id_department'),
                'name' => $request->input('name'),
                'faculty_id' => $id_faculty,
                'accreditation' => $request->input('accreditation'),
                'sk_num' => $request->input('sk_num'),

            ]);
            $departments -> save();
            return redirect()->back()->with('message', 'Program studi berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    public function detailFaculty($id_faculty){

        $departments = Department::where('faculty_id',$id_faculty)->get();
        return view ('department.list', compact('departments','id_faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $departments = Department::find($request->id_department);
            $departments -> name = $request ->input ('name');
            $departments -> save();
            return redirect()->back()->with('message', 'Program Studi berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $dapertments = Department::find($id_department)->delete();
        return redirect()->back()->with('message', 'Program studi berhasil dihapus');
    }
}
