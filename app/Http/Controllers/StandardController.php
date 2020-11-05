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
        try {
            $standards = new Standard ([
                'id_standard' => $request->input('id_standard'),
                'name' => $request->input('name'),
            ]);
            $standards -> save();
            return redirect()->back()->with('message', 'Standar berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request)
    {
        try {
            $standards = Standard::find($request->id_standard);
            $standards -> name = $request ->input ('name');
            $standards -> save();
            return redirect()->back()->with('message', 'Standar berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function destroy($id_standard)
    {
        $standards = Standard::find($id_standard)->delete();
        return redirect()->back()->with('message', 'Standar berhasil dihapus');
    }
}
