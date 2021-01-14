<?php

namespace App\Http\Controllers;

use App\Standard;
use App\Instrument;
use App\Periode;
use App\Audit;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function detailInstrument($id_instrument){
        $standards = Standard::where('instrument_id',$id_instrument)->paginate(10);
        $instrument = Instrument::where('id_instrument',$id_instrument)->first();
        return view ('standard.list', compact('standards', 'instrument', 'id_instrument'));
    }

    public function store(Request $request, $id_instrument){
        $standards = new Standard ([
            'name' => $request->input('name'),
            'instrument_id' => $id_instrument,
        ]);
        $standards -> save();
        \Session::flash('sukses','Standar berhasil di tambahkan');
        return redirect()->back();
    }


    public function update(Request $request){
        $standards = Standard::find($request->id_standard);
        $standards -> name = $request ->input ('name');
        $standards -> save();
        \Session::flash('sukses','Standar berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id_standard){
        $standards = Standard::find($id_standard)->delete();
        \Session::flash('sukses','Standar berhasil hapus');
        return redirect()->back();
    }
}
