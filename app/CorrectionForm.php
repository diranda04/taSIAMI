<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrectionForm extends Model
{
    protected $fillable = ['id_correction_form','audit_id','devience','causes','plan','date'];
    protected $primaryKey = 'id_correction_form';
    public $incrementing = false;

    public function audit()
    {
        return $this->belongsTo(Audit::class,'audit_id','id_audit');
    }
}
