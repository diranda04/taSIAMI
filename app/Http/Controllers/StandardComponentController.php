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
                'id_standard_component' => $request->input('id_standard_component'),
                'desc' => $request->input('desc'),
                'standard_id' => $id_standard,
            ]);
            $standard_components -> save();
            return redirect()->back()->with('message', 'Komponen standar berhasil ditambahkan');
    }

    public function detailStandard($id_standard){
        $standard_components = StandardComponent::where('standard_id',$id_standard)->get();
        return view ('standard_component.list', compact('standard_components','id_standard'));
    }

    public function update(Request $request)
    {
        try {
            $standard_components = StandardComponent::find($request->id_standard_component);
            $standard_components -> desc = $request ->input ('desc');
            $standard_components -> save();
            return redirect()->back()->with('message', 'Komponen Standar berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id_standard_component)
    {
        $standard_components = StandardComponent::find($id_standard_component)->delete();
        return redirect()->back()->with('message', 'Komponen standar berhasil dihapus');
    }
}
