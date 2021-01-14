<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Department;
use App\DepartmentAudit;
use App\Periode;
use App\Auditee;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PDF;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index(){
        $audits = Audit::all();
        $periodes = Periode::all();
        $departments = Department:: all();
        return view ('audit.index', compact('audits','periodes','departments'));
    }

    public function prodiAudit(){
        $auditors = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        ->leftJoin('periodes', 'periodes.id_periode', '=', 'audits.periode_id')
        ->leftJoin('department_audits', 'department_audits.audit_id', '=', 'audits.id_audit')
        ->leftJoin('auditors', 'auditors.id_auditor', '=', 'department_audits.auditor_id')
        ->leftJoin('users', 'users.id', '=', 'auditors.id_auditor')
        ->where('id_auditor', Auth::user()->id)
        ->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();

        $test = DepartmentAudit::join('auditors','department_audits.auditor_id','=','auditors.id_auditor')->join('users','auditors.id_auditor','=','users.id')->join('audits','department_audits.audit_id','=','audits.id_audit')->join('departments','audits.department_id','=','departments.id_department')->join('periodes','audits.periode_id','=','periodes.id_periode')->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();

        // dd($test);

        // $auditors = Audit::whereIn('id_audit',Auth::user()->auditor->departmentAudit->pluck('audit_id')->toArray())->get();


        return view ('auditor.audit_prodi', compact('auditors','test'));
    }

    public function lihatAuditProdi(){
        $auditees = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        ->leftJoin('periodes', 'periodes.id_periode', '=', 'audits.periode_id')
        ->leftJoin('auditees', 'auditees.department_id', '=', 'departments.id_department')
        ->leftJoin('users', 'users.id', '=', 'auditees.id_auditee')
        ->where('user_id', Auth::user()->id)
        ->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();

        $test = DepartmentAudit::join('auditors','department_audits.auditor_id','=','auditors.id_auditor')->join('users','auditors.id_auditor','=','users.id')->join('audits','department_audits.audit_id','=','audits.id_audit')->join('departments','audits.department_id','=','departments.id_department')->join('periodes','audits.periode_id','=','periodes.id_periode')->where('audits.department_id',Auth::user()->auditee()->first()->department_id)->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();


        return view ('auditee.audit_prodi', compact('auditees', 'test'));
    }

    public function beritaAcara($id_audit){
        $audits = Audit::where('id_audit',$id_audit)->get();
        $user_id = auth()->user()->id;
        $auditee = Auditee::where('user_id', $user_id)->first();
        $Deans = User::join("deans","users.id","deans.user_id")
        ->where("faculty_id", auth()->user()->auditee->first()->department->faculty_id)->orderBy('end_at', "desc")->first();
        $auditors = DepartmentAudit::join("auditors", "department_audits.auditor_id", "=","auditors.id_auditor")
        ->join("audits", "department_audits.audit_id", "=", "audits.id_audit")
        ->join("users", "users.id", "=", "auditors.id_auditor")
        ->join("departments", "audits.department_id","=", "departments.id_department")
        ->where("audits.id_audit", $id_audit)->get();
        view()->share('audits', $audits);
        $pdf = PDF::loadview('beritaAcara', compact('auditee', 'Deans', 'auditors', 'id_audit'));
        return $pdf->stream();
    }

    public function dokumenAudit(){
        // $auditors = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        // ->leftJoin('periodes', 'periodes.id_periode', '=', 'audits.periode_id')
        // ->leftJoin('department_audits', 'department_audits.audit_id', '=', 'audits.id_audit')
        // ->leftJoin('auditors', 'auditors.id_auditor', '=', 'department_audits.auditor_id')
        // ->leftJoin('users', 'users.id', '=', 'auditors.id_auditor')
        // ->where('id_auditor', Auth::user()->id)->get();
        // $test = DepartmentAudit::join('auditors','department_audits.auditor_id','=','auditors.id_auditor')
        // ->join('users','auditors.id_auditor','=','users.id')
        // ->join('audits','department_audits.audit_id','=','audits.id_audit')
        // ->join('departments','audits.department_id','=','departments.id_department')
        // ->join('periodes','audits.periode_id','=','periodes.id_periode')
        // ->where('audits.department_id',Auth::user()->auditor->departmentAudit()
        // ->first()->audit()->first()->department_id)->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        // ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();

        $auditors = Audit::whereIn('id_audit',Auth::user()->auditor->departmentAudit->pluck('audit_id')->toArray())->get();
        return view ('auditor.dokumen_audit', compact('auditors'));

        // return view ('auditor.dokumen_audit', compact('auditors'));
    }
    public function dokumenAuditee(){
        // $auditees = Department::leftJoin('audits', 'audits.department_id', '=', 'departments.id_department')
        // ->leftJoin('periodes', 'periodes.id_periode', '=', 'audits.periode_id')
        // ->leftJoin('auditees', 'auditees.department_id', '=', 'departments.id_department')
        // ->leftJoin('users', 'users.id', '=', 'auditees.id_auditee')
        // ->where('user_id', Auth::user()->id)->get();

        // $test = DepartmentAudit::join('auditors','department_audits.auditor_id','=','auditors.id_auditor')
        // ->join('users','auditors.id_auditor','=','users.id')
        // ->join('audits','department_audits.audit_id','=','audits.id_audit')
        // ->join('departments','audits.department_id','=','departments.id_department')
        // ->join('periodes','audits.periode_id','=','periodes.id_periode')
        // ->where('audits.department_id',Auth::user()->auditee()->first()->department_id)
        // ->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        // ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();
        // return view ('auditee.dokumen_audit', compact('auditees', 'test'));

        $audits = Audit::where('department_id',Auth::user()->auditee()
        ->whereRaw(date('Y').' between start_at and end_at')->first()->department_id)->get();

        return view ('auditee.dokumen_audit', compact('audits'));
    }

    public function dokumenAdmin(){
        $audits = Audit::all();
        return view ('admin.dokumen_audit', compact('audits'));
    }

    public function penempatan(){
        $auditors =DepartmentAudit::join("auditors", "department_audits.auditor_id", "=","auditors.id_auditor")
        ->join("users", "auditors.id_auditor", "=", "users.id")
        ->join("audits", "department_audits.audit_id", "=", "audits.id_audit")
        ->join("departments", "audits.department_id","=", "departments.id_department")
        ->join("periodes", "audits.periode_id","=", "periodes.id_periode")
        ->orderBy('department_name', 'asc')
        ->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();

        $auditees =Auditee::join("users", "auditees.user_id", "=", "users.id")
        ->join("departments", "departments.id_department", "=", "auditees.department_id")
        ->join("audits", "departments.id_department", "=", "audits.department_id")
        ->join("periodes", "audits.periode_id","=", "periodes.id_periode")
        ->orderBy('department_name', 'asc')
        ->whereDate('audit_start_at', '<', Carbon::now()->toDateString())
        ->whereDate('audit_end_at','>', Carbon::now()->toDateString())->get();

        view()->share('auditors',$auditors);
        $pdf = PDF::loadview('penempatan', compact ('auditors', 'auditees'));
        return $pdf->stream();
    }

    public function store(Request $request){
        $audits = Audit::create ([
            'periode_id' => $request->input('periodeSelect'),
            'department_id' => $request->input('prodiSelect')
        ]);
        $audits->save();
        \Session::flash('sukses','Periode audit prodi berhasil ditambahkan');
        return redirect ()->route('audit.index');
    }

    public function destroy($id_audit){
        $audits = Audit::find($id_audit)->delete();
        \Session::flash('sukses','Periode audit prodi berhasil dihapus');
        return redirect()->route('audit.index');
    }
}
