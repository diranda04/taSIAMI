<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = ['id_standard','name'];
    protected $primaryKey = 'id_standard';
    public $incrementing = false;

    public function auditInstrument(){
        return $this->hasMany(AuditInstrument::class);
    }

    public function standardComponent(){
        return $this->hasMany(StandardComponent::class);
    }
}
