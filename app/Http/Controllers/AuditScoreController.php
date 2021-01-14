<?php

namespace App\Http\Controllers;

use App\AuditScore;
use App\Audit;
use App\Department;
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
        $standards = Standard::with("standardComponent")->join("instruments","standards.instrument_id","instruments.id_instrument")->join("periodes","instruments.id_instrument","periodes.instrument_id")->join("audits","periodes.id_periode","audits.periode_id")->where("audits.id_audit",$id_audit)->paginate(1);
        $department = Department::join('audits', 'audits.department_id', '=', 'departments.id_department')->where('id_audit',$id_audit)->first();
        $score_details = ScoreDetail::all();
        return view ('auditee.input_skor', compact('standards', 'department','score_details', 'id_audit'));
    }
    public function indexAuditor($id_audit)
    {
        $standards = Standard::with("standardComponent")->join("instruments","standards.instrument_id","instruments.id_instrument")->join("periodes","instruments.id_instrument","periodes.instrument_id")->join("audits","periodes.id_periode","audits.periode_id")->where("audits.id_audit",$id_audit)->paginate(1);
        $department = Department::join('audits', 'audits.department_id', '=', 'departments.id_department')->where('id_audit',$id_audit)->first();
        $score_details = ScoreDetail::all();
        return view ('auditor.input_skor', compact('standards','score_details','department', 'id_audit'));
    }

    public function get_score($id){
        $data_score = ScoreDetail::where('question_id',$id)->get();
        return response()->json(['data_score'=>$data_score]);
    }

    public function store(Request $request, $id_audit, $id_question){
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
            return redirect()->back()->with('message', 'Skor Berhasil Ditambahkan');
        }else{
            \Session::flash('sukses','Data sudah ada');
            return redirect()->back();
        }

    }

    public function scoreAuditor(Request $request, $id_audit, $id_question){
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
            return redirect()->back()->with('message', 'Skor Berhasil Ditambahkan');
        }else{
            $audit_scores = AuditScore::where('id_audit_score', $request->id_score_audit)->first();
            $audit_scores -> score_auditor = $request -> score_auditor;
            $audit_scores->save();
            \Session::flash('sukses','Skor Audit berhasil diubah');
            return redirect()->back();
        }
    }


}
