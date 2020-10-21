<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAudit extends Model
{
    protected $fillable = ['id_department_audit','auditor_id','audit_id'];
    protected $primaryKey = 'id_department_audit';
    public $incrementing = false;

    public function auditor()
    {
        return $this->belongsTo(Auditor::class,'auditor_id','id_auditor');
    }

    public function audit()
    {
        return $this->belongsTo(Audit::class,'audit_id','id_audit');
    }
}
