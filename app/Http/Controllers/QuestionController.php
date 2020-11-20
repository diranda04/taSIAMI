<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question:: all();
        return view ('question.list', compact('questions'));
    }

    public function store($id_standard_component, Request $request)
    {
        $questions = new Question ([
            'desc' => $request->input('desc'),
            'standard_component_id' => $id_standard_component,

        ]);
        $questions->save();
        \Session::flash('sukses','Indikator penilaian berhasil ditambahkan');
        return redirect()->back();
    }

    public function detailComponent($id_standard_component){

        $questions = Question::where('standard_component_id',$id_standard_component)->get();
        return view ('question.list', compact('questions','id_standard_component'));
    }

    public function update(Request $request)
    {
            $question = Question::find($request->id_question);
            $question -> desc = $request ->input ('desc');
            $question -> save();
            \Session::flash('sukses','Indikator penilaian berhasil diubah');
            return redirect()->back();
    }

    public function destroy($id_question)
    {
        $questions = Question::find($id_question)->delete();
        \Session::flash('sukses','Indikator Penilaian berhasil dihapus');
        return redirect()->back();
    }
}
