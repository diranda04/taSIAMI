<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

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

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_department_audit' => [
                'format' => 'DA?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
}
