<?php

namespace App\Http\Controllers;

use App\AuditScore;
use App\Audit;
use App\Question;
use App\StandardComponent;
use App\Standard;
use App\ScoreDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditScoreController extends Controller
{
    public function indexAuditee($id_audit)
    {
        $audit_scores = AuditScore::where('audit_id',$id_audit)->get();
        $questions = Question::select('questions.id_question', 'questions.desc','audit_scores.id_audit_score','audit_scores.score_auditee', 'audit_scores.score_auditor')->leftjoin('audit_scores','questions.id_question','=','audit_scores.question_id')->paginate(10);
        $score_details = ScoreDetail::all();
        return view ('auditee.input_skor', compact('audit_scores','questions','score_details', 'id_audit'));
    }
    public function indexAuditor($id_audit)
    {
        $audit_scores = AuditScore::where('audit_id',$id_audit)->get();
        $questions = Question::select('questions.id_question', 'questions.desc','audit_scores.id_audit_score','audit_scores.score_auditee', 'audit_scores.score_auditor')->leftjoin('audit_scores','questions.id_question','=','audit_scores.question_id')->paginate(10);
        $score_details = ScoreDetail::all();
        return view ('auditor.input_skor', compact('audit_scores','questions','score_details', 'id_audit'));
    }

    public function get_score($id)
    {
        $data_score = ScoreDetail::where('question_id',$id)->get();
        return response()->json(['data_score'=>$data_score]);
    }

    public function store(Request $request, $id_audit, $id_question)
    {
        $check = DB::table('audit_scores')
            ->select('id_audit_score')
            ->where('audit_id', $id_audit)
            ->where('question_id', $id_question)
            ->first();

        if(!$check){

            $audit_scores = new AuditScore ([
                'audit_id' => $id_audit,
                'question_id' => $id_question,
                'score_auditee' => $request->input('score_auditee'),
            ]);
            $audit_scores->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('message', 'Data sudah ada');
        }

    }

    public function scoreAuditor(Request $request, $id_audit, $id_question)
    {
        $check = DB::table('audit_scores')
        ->select('id_audit_score')
        ->where('audit_id', $id_audit)
        ->where('question_id', $id_question)
        ->whereRaw('score_auditor IS NOT NULL')
        ->first();

    if(!$check){
            $audit_scores = AuditScore::firstOrNew ([
                'audit_id' => $id_audit,
                'question_id' => $id_question
                ]);

            $audit_scores -> score_auditor = $request -> input ('score_auditor');
            $audit_scores->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('message', 'Data sudah ada');
        }
    }

    public function destroy(AuditScore $auditScore)
    {
        //
    }
}
