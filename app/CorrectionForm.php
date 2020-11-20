<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class CorrectionForm extends Model
{
    protected $fillable = ['id_correction_form','audit_id','devience','causes','plan','date'];
    protected $primaryKey = 'id_correction_form';
    public $incrementing = false;

    public function audit()
    {
        return $this->belongsTo(Audit::class,'audit_id','id_audit');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_correction_form' => [
                'format' => 'PTK-?',
                'length' => 5
            ]
        ];
    }
}
