<?php

namespace App\Http\Controllers;

use App\Standard;
use App\AuditInstrument;
use App\Periode;
use App\Audit;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function index()
    {
        $standards = Standard::paginate(10);
     //  dd($standards);
        return view ('standard.list', compact('standards'));
    }

    public function store(Request $request)
    {
            $standards = new Standard ([
                'name' => $request->input('name'),
            ]);
            $standards -> save();
            \Session::flash('sukses','Standar berhasil di tambahkan');
            return redirect()->back();
    }

    public function update(Request $request)
    {
            $standards = Standard::find($request->id_standard);
            $standards -> name = $request ->input ('name');
            $standards -> save();
            \Session::flash('sukses','Standar berhasil diubah');
            return redirect()->back();
    }

    public function destroy($id_standard)
    {
        $standards = Standard::find($id_standard)->delete();
        \Session::flash('sukses','Standar berhasil hapus');
        return redirect()->back();
    }
}
