<?php

namespace App\Http\Controllers;

use App\Standard;
use App\AuditInstrument;
use App\Periode;
use App\Audit;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standards = Standard::paginate(10);
     //  dd($standards);
        return view ('standard.list', compact('standards'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    // public function edit($id_standard)
    // {
    //     $standard = Standard::find($id_standard);
    //     return view ('standard.edit', compact('standards'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_standard)
    {
        $standards = Standard::find($id_standard)->delete();
        return redirect()->back()->with('message', 'Standar berhasil dihapus');
    }
}
