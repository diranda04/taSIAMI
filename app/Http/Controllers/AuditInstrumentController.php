<?php

namespace App\Http\Controllers;

use App\AuditInstrument;
use App\Standard;
use App\Department;
use App\Periode;
use App\Question;
use Auth;
use Illuminate\Http\Request;
use PDF;

class AuditInstrumentController extends Controller
{
    public function index()
    {
        $audit_instruments = AuditInstrument:: all();
        $standards = Standard:: all();
        $periodes = Periode:: all();
        return view ('instrument.index', compact('audit_instruments','standards','periodes'));
    }

    public function addPs(){
        $audit_instruments = AuditInstrument:: all();
        $standards = Standard:: all();
        $periodes = Periode:: all();
        return view ('instrument.add', compact('audit_instruments','standards','periodes'));
    }


    public function printReport($id_audit){

        $standards = Standard:: all();
        $rata_rata = 0;
        $data =[];

        // $query = Question::select("standard_components.*","questions.*","audit_scores.*")->join("standard_components","questions.standard_component_id","=","standard_components.id_standard_component")->join("audit_scores","questions.id_question","=","audit_scores.question_id")->where("standard_components.standard_id","STD02")->get();
        // dd($query->count());
        foreach($standards as $std){
            $query = Question::select("standard_components.*","questions.*","audit_scores.*","audits.*")->
            join("standard_components","questions.standard_component_id","=","standard_components.id_standard_component")->
            join("audit_scores","questions.id_question","=","audit_scores.question_id")->
            join("audits","audit_scores.audit_id","audits.id_audit")->
            where("standard_components.standard_id", $std->id_standard)->where("audit_scores.audit_id", $id_audit)->get();
            foreach($query as $nilai)
            {
                $rata_rata = $rata_rata + $nilai->score_auditor;
            }
            $rata_rata = $rata_rata / $query->count();
            $data[] = [
                "standard_component"    => $std->name,
                "rata_rata"             => round($rata_rata,2)
            ];
            $rata_rata = 0;
        }
        // dd($data);
        view()->share('standards',$standards);
        $pdf = PDF::loadview('report',['standards'=> $data]);
        return $pdf->stream();
    }

    public function lihatReport($id_audit){
        try {
        $standards = Standard:: all();
        $questions = Question::select('questions.id_question', 'questions.desc','audit_scores.id_audit_score','audit_scores.score_auditee', 'audit_scores.score_auditor')
        ->leftjoin('audit_scores','questions.id_question','=','audit_scores.question_id')->where('audit_id', $id_audit)->paginate(10);

        $rata_rata = 0;
        $data = [];
        $standards_title = [];
        $graph_avg = [];
        foreach($standards as $std){
            $query = Question::select("standard_components.*","questions.*","audit_scores.*","audits.*")->
            join("standard_components","questions.standard_component_id","=","standard_components.id_standard_component")->
            join("audit_scores","questions.id_question","=","audit_scores.question_id")->
            join("audits","audit_scores.audit_id","audits.id_audit")->
            where("standard_components.standard_id", $std->id_standard)->where("audit_scores.audit_id", $id_audit)->get();
            foreach($query as $nilai)
            {
                $rata_rata = $rata_rata + $nilai->score_auditor;
            }
            $rata_rata = $rata_rata / $query->count();
            $data[] = [
                "standard_component"    => $std->name,
                "rata_rata"             => round($rata_rata,2)
            ];

            $standards_title[] = $std->name;
            $graph_avg[] = round($rata_rata,2);
            $rata_rata = 0;
        }

        return view ('audit.lihat_report',['standards'=> $data ,'graph_avg' => $graph_avg ,'standards_title' => $standards_title, 'questions'=>$questions]);
        } catch (\Throwable $th) {
            \Session::flash('sukses','Pengisian skor audit belum diselesaikan');
            return redirect()->back();
        }

    }


    public function store(Request $request)
    {
        try {
            $audit_instruments = AuditInstrument::create ([
                'standard_id' => $request->input('standardSelect'),
                'periode_id' => $request->input('periodeSelect')
            ]);
            $audit_instruments->save();
            return redirect ()->route('instrument.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy($id)
    {
        $audit_instruments = AuditInstrument::find($id)->delete();
        return redirect()->back()->with('message', 'Dekan berhasil dihapus');
    }
}
