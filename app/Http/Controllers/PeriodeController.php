<?php

namespace App\Http\Controllers;

use App\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::paginate(5);
        return view ('periode.index', compact('periodes'));
    }

    public function store(Request $request)
    {
        try {
            $periodes = new Periode ([
                'audit_start_at' => Carbon::parse($request->input('audit_start_at')),
                'audit_end_at' => Carbon::parse($request->input('audit_end_at')),
            ]);
            $periodes -> save();
            \Session::flash('sukses','Periode audit berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id_periode)
    {
        $periodes = Periode::find($id_periode)->delete();
        \Session::flash('sukses','Periode audit berhasil dihapus');
        return redirect()->back();
    }
}
