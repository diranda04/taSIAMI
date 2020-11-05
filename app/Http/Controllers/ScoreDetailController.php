<?php

namespace App\Http\Controllers;

use App\ScoreDetail;
use Illuminate\Http\Request;

class ScoreDetailController extends Controller
{
    public function index()
    {
        $score_details = ScoreDetail:: all();
        return view ('score_detail.list', compact('score_details'));
    }

    public function store($id_question, Request $request)
    {
        $score_details = new ScoreDetail ([
            'question_id' => $id_question,
            'score' => $request->input('score'),
            'desc' => $request->input('desc'),
        ]);
        $score_details->save();
        return redirect()->back()->with('message', 'Detail penilaian berhasil ditambahkan');
    }

    public function detailComponent($id_question){

        $score_details = ScoreDetail::where('question_id',$id_question)->get();
        return view ('score_detail.list', compact('score_details','id_question'));
    }

    public function update(Request $request)
    {
        try {
            $score_detail = ScoreDetail::find($request->id_score_detail);
            $score_detail -> desc = $request ->input ('desc');
            $score_detail -> save();
            return redirect()->back()->with('message', 'Detail penilaian berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id_score_detail)
    {
        $score_details = Score_detail::find($id_score_detail)->delete();
        return redirect()->back()->with('message', 'Detail penilaian berhasil dihapus');
    }
}
