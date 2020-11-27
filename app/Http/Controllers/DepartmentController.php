<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function store(Request $request, $id_faculty){
        $departments = new Department ([
            'department_name' => $request->input('department_name'),
            'faculty_id' => $id_faculty,
            'accreditation' => $request->input('accreditation'),
            'sk_num' => $request->input('sk_num'),
        ]);
        $departments -> save();
        \Session::flash('sukses','Program studi berhasil ditambahkan');
        return redirect()->back();
    }

    public function detailFaculty($id_faculty){
        $departments = Department::where('faculty_id',$id_faculty)->get();
        $faculties =Faculty::where('id_faculty', $id_faculty)->first();
        return view ('department.list', compact('departments','faculties','id_faculty'));
    }

    public function update(Request $request){
        $departments = Department::find($request->id_department);
        $departments -> department_name = $request ->input ('department_name');
        $departments -> accreditation = $request ->input ('accreditation');
        $departments -> sk_num = $request ->input ('sk_num');
        $departments -> save();
        \Session::flash('sukses','Program Studi berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id_department){
        $dapertments = Department::find($id_department)->delete();
        \Session::flash('sukses','Program studi berhasil hapus');
        return redirect()->back();
    }
}
