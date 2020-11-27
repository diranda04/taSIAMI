<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $fillable = ['id_auditor','status','start_at'];
    protected $primaryKey = 'id_auditor';
    public $incrementing = false;

    public function lecturer (){
        return $this->belongsTo(Lecturer::class, 'id_auditor', 'id_lecturer');
    }

    public function departmentAudit(){
        return $this->hasMany(DepartmentAudit::class, 'auditor_id', 'id_auditor');
    }



    // public function audit(){
    //     return $this->belongsToMany(Audit::class, 'department_audits', 'audit_id', 'auditor_id');
    // }
}
