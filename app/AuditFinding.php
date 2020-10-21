<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditFinding extends Model
{
    protected $fillable = ['id_audit_finding','audit_id','desc'];
    protected $primaryKey = 'id_audit_finding';
    public $incrementing = false;

    public function audit()
    {
        return $this->belongsTo(Audit::class,'audit_id','id_audit');
    }
}
