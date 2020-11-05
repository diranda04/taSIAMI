<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department:: all();
        return view ('department.list', compact('departments'));
    }

    public function store(Request $request, $id_faculty)
    {
        try {
            $departments = new Department ([
                'id_department' => $request->input('id_department'),
                'department_name' => $request->input('department_name'),
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

    public function detailFaculty($id_faculty){

        $departments = Department::where('faculty_id',$id_faculty)->get();
        return view ('department.list', compact('departments','id_faculty'));
    }

    public function update(Request $request)
    {
        try {
            $departments = Department::find($request->id_department);
            $departments -> department_name = $request ->input ('department_name');
            $departments -> save();
            return redirect()->back()->with('message', 'Program Studi berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy(Department $department)
    {
        $dapertments = Department::find($id_department)->delete();
        return redirect()->back()->with('message', 'Program studi berhasil dihapus');
    }
}
