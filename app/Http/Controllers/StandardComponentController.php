<?php

namespace App\Http\Controllers;

use App\StandardComponent;
use App\Standard;
use Illuminate\Http\Request;

class StandardComponentController extends Controller
{
    public function store(Request $request, $id_standard){
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
        $standard = Standard::where('id_standard',$id_standard)->first();
        return view ('standard_component.list', compact('standard_components','standard','id_standard'));
    }

    public function update(Request $request){
        $standard_components = StandardComponent::find($request->id_standard_component);
        $standard_components -> desc = $request ->input ('desc');
        $standard_components -> save();
        \Session::flash('sukses','Komponen standar berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id_standard_component){
        $standard_components = StandardComponent::find($id_standard_component)->delete();
        \Session::flash('sukses','Komponen standar berhasil dihapus');
        return redirect()->back();
    }
}
