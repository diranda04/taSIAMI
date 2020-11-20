<?php

namespace App\Http\Controllers;

use App\Auditor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditorController extends Controller
{
    public function index(){
        $auditors = Auditor::all();
        $users = User::all();
        return view('auditor.index', compact('auditors','users'));
    }

    public function addAuditor(){
        $auditors = Auditor::all();
        $users = User:: where('role_id', '=', 2)->whereNotExists(function($query){
            $query->select(DB::raw(1))
                    ->from('auditors')
                    ->whereRaw('auditors.id_auditor = users.id');
            })
            ->get();
        return view('auditor.add', compact('auditors','users'));
    }

    public function changeStatus($id_auditor)
    {
        $data = \DB::table('auditors')->where('id_auditor',$id_auditor)->first();

        $status_sekarang = $data->status;

        if($status_sekarang == 1){
            \DB::table('auditors')->where('id_auditor',$id_auditor)->update([
                'status'=>0
            ]);
        }else{
            \DB::table('auditors')->where('id_auditor',$id_auditor)->update([
                'status'=>1
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');

        return redirect ()->route('auditor.index');

    }

    public function store(Request $request)
    {
            $auditors = new auditor ([
                'id_auditor' => $request->input('auditorSelect'),
                'status' => $request->input('status'),
                'start_at' => $request->input('start_at'),

            ]);

            $auditors->save();
            return redirect ()->route('auditor.index');
    }

    public function destroy($id_auditor)
    {
        $auditors = Auditor::find($id_auditor)->delete();
        return redirect()->back();
    }
}
