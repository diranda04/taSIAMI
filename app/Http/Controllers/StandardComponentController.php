<?php

namespace App\Http\Controllers;

use App\StandardComponent;
use Illuminate\Http\Request;

class StandardComponentController extends Controller
{
    public function index()
    {
        $standard_components = StandardComponent:: all();
        return view ('standard_component.list', compact('standard_components'));
    }

    public function store(Request $request, $id_standard)
    {
            $standard_components = new StandardComponent ([
                'desc' => $request->input('desc'),
                'standard_id' => $id_standard,
            ]);
            $standard_components -> save();
            \Session::flash('sukses','Komponen standar berhasil ditambahkan');
            return redirect()->back();
    }

    public function detailStandard($id_standard){
        $standard_components = StandardComponent::where('standard_id',$id_standard)->get();
        return view ('standard_component.list', compact('standard_components','id_standard'));
    }

    public function update(Request $request)
    {
            $standard_components = StandardComponent::find($request->id_standard_component);
            $standard_components -> desc = $request ->input ('desc');
            $standard_components -> save();
            \Session::flash('sukses','Komponen standar berhasil diubah');
            return redirect()->back();
    }

    public function destroy($id_standard_component)
    {
        $standard_components = StandardComponent::find($id_standard_component)->delete();
        \Session::flash('sukses','Komponen standar berhasil dihapus');
        return redirect()->back();
    }
}
