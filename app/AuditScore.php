<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditScore extends Model
{
    protected $fillable = ['id_audit_score','audit_id','question_id','score_auditee','score_auditor'];
    protected $primaryKey = 'id_audit_score';

    public function audit()
    {
        return $this->belongsTo(Audit::class,'audit_id','id_audit');
    }
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id_question');
    }
}
