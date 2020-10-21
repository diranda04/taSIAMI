<?php

namespace App\Http\Controllers;

use App\ScoreDetail;
use Illuminate\Http\Request;

class ScoreDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $score_details = ScoreDetail:: all();
        return view ('score_detail.list', compact('score_details'));
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
    public function store($id_question, Request $request)
    {
        $score_details = new ScoreDetail ([
            'id_score_detail' => $request->input('id_score_detail'),
            'question_id' => $id_question,
            'score' => $request->input('score'),
            'desc' => $request->input('desc'),
        ]);
        $score_details->save();
        return redirect()->back();
    }

    public function detailComponent($id_question){

        $score_details = ScoreDetail::where('question_id',$id_question)->get();
        return view ('score_detail.list', compact('score_details','id_question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScoreDetail  $scoreDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreDetail $scoreDetail, $id_score_detail)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScoreDetail  $scoreDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreDetail $scoreDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScoreDetail  $scoreDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $score_detail = ScoreDetail::find($request->id_score_detail);
            $score_detail -> desc = $request ->input ('desc');
            $score_detail -> save();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScoreDetail  $scoreDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_score_detail)
    {
        $score_details = Score_detail::find($id_score_detail)->delete();
        return redirect()->back();
    }
}
