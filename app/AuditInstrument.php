<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditInstrument extends Model
{
    protected $fillable = ['standard_id', 'periode_id']; 



    public function standard()
    {
        return $this->belongsTo(Standard::class,'standard_id','id_standard');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id','id_periode');
    }
}
