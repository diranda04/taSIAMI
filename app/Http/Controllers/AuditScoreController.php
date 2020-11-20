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
        $audits = Audit::select('questions.id_question', 'questions.desc', 'audits.id_audit', 'audit_scores.id_audit_score',DB::RAW("case when audit_scores.audit_id = '$id_audit' then audit_scores.score_auditee else '' end as score_auditee "), DB::RAW("case when audit_scores.audit_id = '$id_audit' then audit_scores.score_auditor else '' end as score_auditor "))
        ->join('periodes', 'periodes.id_periode','=', 'audits.periode_id')
        ->join('audit_instruments', 'audit_instruments.periode_id', 'periodes.id_periode')
        ->join('standards', 'standards.id_standard', '=', 'audit_instruments.standard_id')
        ->join('standard_components', 'standard_components.standard_id', '=', 'standards.id_standard')
        ->join('questions', 'questions.standard_component_id', '=', 'standard_components.id_standard_component')
        ->where('id_audit', $id_audit)
        ->leftjoin('audit_scores', 'questions.id_question','=','audit_scores.question_id')
        // ->get();
        ->paginate(10);

        $score_details = ScoreDetail::all();
        return view ('auditee.input_skor', compact('audits','score_details', 'id_audit'));
    }
    public function indexAuditor($id_audit)
    {
        $audits = Audit::select('questions.id_question', 'questions.desc', 'audits.id_audit', 'audit_scores.id_audit_score',DB::RAW("case when audit_scores.audit_id = '$id_audit' then audit_scores.score_auditee else '' end as score_auditee "), DB::RAW("case when audit_scores.audit_id = '$id_audit' then audit_scores.score_auditor else '' end as score_auditor "))
        ->join('periodes', 'periodes.id_periode','=', 'audits.periode_id')
        ->join('audit_instruments', 'audit_instruments.periode_id', 'periodes.id_periode')
        ->join('standards', 'standards.id_standard', '=', 'audit_instruments.standard_id')
        ->join('standard_components', 'standard_components.standard_id', '=', 'standards.id_standard')
        ->join('questions', 'questions.standard_component_id', '=', 'standard_components.id_standard_component')
        ->where('id_audit', $id_audit)
        ->leftjoin('audit_scores', 'questions.id_question','=','audit_scores.question_id')

        // ->get();
        ->paginate(10);
        // dd($audits);

        $score_details = ScoreDetail::all();
        $audit_scores = AuditScore::where('audit_id', $id_audit)->get();
        return view ('auditor.input_skor', compact('audits','score_details','audit_scores', 'id_audit'));
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
            \Session::flash('sukses','Berhasil menambahkan skor taksiran');
            return redirect()->back();
        }else{
            \Session::flash('sukses','Data sudah ada');
            return redirect()->back();
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
            \Session::flash('sukses','Berhasil menambahkan skor audit');
            return redirect()->back();
        }else{
            \Session::flash('sukses','Data sudah ada');
            return redirect()->back();
        }
    }

    public function destroy(AuditScore $auditScore)
    {
        //
    }
}
