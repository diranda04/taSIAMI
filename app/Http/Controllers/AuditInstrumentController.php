<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\Standard;
use App\Department;
use App\Periode;
use App\Question;
use App\Book;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AuditInstrumentController extends Controller
{
    public function index(){
        $instruments = Instrument::all();
        return view ('audit_book.index', compact('instruments'));
    }

    public function printReport($id_audit){
        $standards = Standard:: all();
        $rata_rata = 0;
        $data =[];
        foreach($standards as $std){
            $query = Question::select("standard_components.*","questions.*","audit_scores.*","audits.*")
            ->join("standard_components","questions.standard_component_id","=","standard_components.id_standard_component")
            ->join("audit_scores","questions.id_question","=","audit_scores.question_id")
            ->join("audits","audit_scores.audit_id","audits.id_audit")
            ->where("standard_components.standard_id", $std->id_standard)
            ->where("audit_scores.audit_id", $id_audit)->get();
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
        view()->share('standards',$standards);
        $pdf = PDF::loadview('report',['standards'=> $data]);
        return $pdf->stream();
    }

    public function lihatReport($id_audit){
    try {
    $querys = Standard::join("instruments","standards.instrument_id","instruments.id_instrument")->join("periodes","instruments.id_instrument","periodes.instrument_id")->join("audits","periodes.id_periode","audits.periode_id")->where("audits.id_audit",$id_audit)->get();
    $standards = Standard::all();
    $standardAudits = Standard::with("standardComponent")->join("instruments","standards.instrument_id","instruments.id_instrument")->join("periodes","instruments.id_instrument","periodes.instrument_id")->join("audits","periodes.id_periode","audits.periode_id")->where("audits.id_audit",$id_audit)->paginate(1);
    $questions = Question::select('questions.id_question', 'questions.desc','audit_scores.id_audit_score','audit_scores.score_auditee', 'audit_scores.score_auditor')
    ->leftjoin('audit_scores','questions.id_question','=','audit_scores.question_id')->where('audit_id', $id_audit)->paginate(10);
    $rata_rata = 0;
    $data = [];
    $standards_title = [];
    $graph_avg = [];
    foreach($querys as $std){
        $query = Question::select("standard_components.*","questions.*","audit_scores.*","audits.*")
        ->join("standard_components","questions.standard_component_id","=","standard_components.id_standard_component")
        ->join("audit_scores","questions.id_question","=","audit_scores.question_id")
        ->join("audits","audit_scores.audit_id","audits.id_audit")
        ->where("standard_components.standard_id", $std->id_standard)
        ->where("audit_scores.audit_id", $id_audit)->get();
        foreach($query as $nilai)
        {
            $rata_rata = $rata_rata + $nilai->score_auditor;
        }
        $rata_rata = $rata_rata / $query->count();
        $data[] = [
            "standard"    => $std->name,
            "rata_rata"   => round($rata_rata,2)
        ];
        $standards_title[] = $std->name;
        asort($data);
        $graph_avg[] = round($rata_rata,2);
        $rata_rata = 0;
    }

        return view ('audit.lihat_report',['standards'=> $data ,'graph_avg' => $graph_avg ,'standards_title' => $standards_title, 'questions'=>$questions, 'standardAudits'=>$standardAudits, 'id_audit'=>$id_audit]);
    } catch (\Throwable $th) {
        \Session::flash('sukses','Pengisian skor audit belum diselesaikan');
        return redirect()->back();
    }
    }

    public function store(Request $request){
        $instruments = Instrument::create ([
            'instrument_name' => $request->input('instrument_name'),
        ]);
        $instruments->save();
        \Session::flash('sukses','Berhasil menambahkan judul buku');
        return redirect ()->back();
    }

    public function update(Request $request){
        $instruments = Instrument::find($request->id_instrument);
        $instruments -> instrument_name = $request ->input ('instrument_name');
        $instruments -> save();
        \Session::flash('sukses','Instrument berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id){
        $instruments = Instrument::find($id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
