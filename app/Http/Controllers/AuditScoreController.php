<?php

namespace App\Http\Controllers;

use App\AuditScore;
use App\Audit;
use App\Question;
use App\StandardComponent;
use App\Standard;
use App\ScoreDetail;
use Illuminate\Http\Request;

class AuditScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAuditee($id_audit)
    {
        $audit_scores = AuditScore::where('audit_id',$id_audit)->get();
        $questions = Question::paginate(10);
        $score_details = ScoreDetail::all();
        return view ('auditee.input_skor', compact('audit_scores','questions','score_details', 'id_audit'));
    }
    public function indexAuditor($id_audit)
    {
        $audit_scores = AuditScore::where('audit_id',$id_audit)->get();
        $questions = Question::paginate(10);
        $score_details = ScoreDetail::all();
        return view ('auditor.input_skor', compact('audit_scores','questions','score_details', 'id_audit'));
    }

    public function get_score($id)
    {
        $data_score = ScoreDetail::where('question_id',$id)->get();
        return response()->json(['data_score'=>$data_score]);
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
    public function store(Request $request, $id_audit, $id_question)
    {
        try {
            $audit_scores = new AuditScore ([
                'audit_id' => $id_audit,
                'question_id' => $id_question,
                'score_auditee' => $request->input('score_auditee'),
            ]);
            $audit_scores->save();
            return redirect()->back();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuditScore  $auditScore
     * @return \Illuminate\Http\Response
     */
    public function show(AuditScore $auditScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuditScore  $auditScore
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditScore $auditScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuditScore  $auditScore
     * @return \Illuminate\Http\Response
     */
    public function scoreAuditor(Request $request, $id_audit, $id_question)
    {

            $audit_scores = AuditScore::firstOrNew ([
                'audit_id' => $id_audit,
                'question_id' => $id_question
                ]);

            $audit_scores -> score_auditor = $request -> input ('score_auditor');
            $audit_scores->save();
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuditScore  $auditScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditScore $auditScore)
    {
        //
    }
}
