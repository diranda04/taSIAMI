<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Standard extends Model
{
    protected $fillable = ['id_standard','instrument_id', 'name' ];
    protected $primaryKey = 'id_standard';
    public $incrementing = false;

    public function instrument(){
        return $this->belongsTo(Instrument::class, 'instrument_id','id_instrument');
    }

    public function standardComponent(){
        return $this->hasMany(StandardComponent::class, 'standard_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_standard' => [
                'format' => 'STD?',
                'length' => 3
            ]
        ];
    }
}
