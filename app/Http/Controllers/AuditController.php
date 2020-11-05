<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Auditor;
use App\Department;
use App\DepartmentAudit;
use App\Lecturer;
use App\Periode;
use App\Auditee;
use App\Dean;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit:: all();
        $periodes = Periode:: all();
        $departments = Department:: all();
        return view ('audit.index', compact('audits','periodes','departments'));
    }

    public function addAudit(){
        $audits = Audit:: all();
        $periodes = Periode:: all();
        $departments = Department:: all();
        return view ('audit.add', compact('audits','periodes','departments'));
    }

    public function prodiAudit(){

        $auditors = Auth::getuser()->auditor->departmentAudit;
        // dd($auditors);
        return view ('auditor.audit_prodi', compact('auditors'));
    }


    public function lihatAuditProdi(){
        $auditees = Auth::getuser()->lecturer->auditee;
        return view ('auditee.audit_prodi', compact('auditees'));
    }

    public function beritaAcara($id_department){
        $audits = Audit::where('department_id',$id_department)->get();
        $user_id = auth()->user()->id;
        $auditee = Auditee::where('lecturer_id', $user_id)->first();
        $Deans = User::join("lecturers","users.id","=","lecturers.id_lecturer")->
        join("deans","lecturers.id_lecturer","deans.lecturer_id")->
        where("faculty_id", auth()->user()->lecturer->auditee->first()->department->faculty_id)->orderBy('end_at', "desc")->first();
        $auditors = DepartmentAudit::join("auditors", "department_audits.auditor_id", "=","auditors.id_auditor")->
        join("audits", "department_audits.audit_id", "=", "audits.id_audit")->join("users", "auditors.id_auditor", "=", "users.id")->
        join("departments", "audits.department_id","=", "departments.id_department")->
        where("audits.department_id", auth()->user()->lecturer->auditee->first()->department->id_department)->get();

        view()->share('audits',$audits);
        $pdf = PDF::loadview('beritaAcara',['audits'=> $audits, 'auditee'=>$auditee, 'Deans'=>$Deans, 'auditors'=>$auditors]);
        return $pdf->stream();

    }

    public function dokumenAudit(){
        $auditors = Auth::getuser()->auditor->departmentAudit;
        return view ('auditor.dokumen_audit', compact('auditors'));
    }
    public function dokumenAuditee(){
        $auditees = Auth::getuser()->lecturer->auditee;
        return view ('auditee.dokumen_audit', compact('auditees'));
    }

    public function dokumenAdmin(){
        $audits = Audit::all();
        return view ('admin.dokumen_audit', compact('audits'));
    }

    public function penempatan(){

        $auditors =DepartmentAudit::join("auditors", "department_audits.auditor_id", "=","auditors.id_auditor")->
        join("audits", "department_audits.audit_id", "=", "audits.id_audit")->join("users", "auditors.id_auditor", "=", "users.id")->
        join("departments", "audits.department_id","=", "departments.id_department")->
        join(DB::raw("(select * from periodes order by audit_start_at asc limit 1) as period"), "audits.periode_id","=", "period.id_periode")->
        get();

        // get();
        $auditees =Auditee::join("lecturers", "lecturers.id_lecturer", "=", "auditees.lecturer_id")->
        join("users", "lecturers.id_lecturer", "=", "users.id")->join("departments", "departments.id_department", "=", "auditees.department_id")->
        join("audits", "departments.id_department", "=", "audits.department_id")->
        join(DB::raw("(select * from periodes order by audit_start_at asc limit 1) as period"), "audits.periode_id","=", "period.id_periode")->
        get();

        // dd($auditees);
        view()->share('auditors',$auditors);
        $pdf = PDF::loadview('penempatan', compact ('auditors', 'auditees'));
        return $pdf->stream();


    }

    public function store(Request $request)
    {
        try {
            $audits = Audit::create ([
                'id_audit' => $request->input('id_audit'),
                'periode_id' => $request->input('periodeSelect'),
                'department_id' => $request->input('prodiSelect')
            ]);
            $audits->save();
            return redirect ()->route('audit.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy($id_audit)
    {
        $audits = Audit::find($id_audit)->delete();
        return redirect()->back();
    }
}
