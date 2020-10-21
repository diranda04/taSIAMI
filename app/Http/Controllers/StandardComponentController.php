<?php

namespace App\Http\Controllers;

use App\StandardComponent;
use Illuminate\Http\Request;

class StandardComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standard_components = StandardComponent:: all();
        return view ('standard_component.list', compact('standard_components'));
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
    public function store(Request $request, $id_standard)
    {
        try {
            $standard_components = new StandardComponent ([
                'id_standard_component' => $request->input('id_standard_component'),
                'desc' => $request->input('desc'),
                'standard_id' => $id_standard,

            ]);
            
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function detailStandard($id_standard){
        $standard_components = StandardComponent::where('standard_id',$id_standard)->get();
        return view ('standard_component.list', compact('standard_components','id_standard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StandardComponent  $standardComponent
     * @return \Illuminate\Http\Response
     */
    public function show(StandardComponent $standardComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StandardComponent  $standardComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(StandardComponent $standardComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StandardComponent  $standardComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $standard_components = StandardComponent::find($request->id_standard_component);
            $standard_components -> desc = $request ->input ('desc');
            $standard_components -> save();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StandardComponent  $standardComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_standard_component)
    {
        $standard_components = StandardComponent::find($id_standard_component)->delete();
        return redirect()->back();
    }
}
