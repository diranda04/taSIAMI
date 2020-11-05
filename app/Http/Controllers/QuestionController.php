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
            'id_question' => $request->input('id_question'),
            'desc' => $request->input('desc'),
            'standard_component_id' => $id_standard_component,

        ]);
        $questions->save();
        return redirect()->back()->with('message', 'Indikator penilaian berhasil ditambahkan');
    }

    public function detailComponent($id_standard_component){

        $questions = Question::where('standard_component_id',$id_standard_component)->get();
        return view ('question.list', compact('questions','id_standard_component'));
    }

    public function update(Request $request)
    {
        try {
            $question = Question::find($request->id_question);
            $question -> desc = $request ->input ('desc');
            $question -> save();
            return redirect()->back()->with('message', 'Indikator penilaian berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
 
    public function destroy($id_question)
    {
        $questions = Question::find($id_question)->delete();
        return redirect()->back()->with('message', 'Indikator penilaian berhasil dihapus');
    }
}
