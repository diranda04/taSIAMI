<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Periode extends Model
{
    protected $fillable = ['id_periode','audit_start_at', 'audit_end_at', 'submit_start_at', 'submit_end_at'];
    protected $primaryKey = 'id_periode';
    public $incrementing = false;

    public function auditInstrument(){
        return $this->hasMany(AuditInstrument::class);
    }

    public function audit(){
        return $this->hasMany(Audit::class);
    }
    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_periode' => [
                'format' => 'P-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
}
