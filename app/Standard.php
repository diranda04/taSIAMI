<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Standard extends Model
{
    protected $fillable = ['id_standard','name'];
    protected $primaryKey = 'id_standard';
    public $incrementing = false;

    public function instrument(){
        return $this->hasMany(Instrument::class);
    }

    public function standardComponent(){
        return $this->hasMany(StandardComponent::class, 'standard_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_standard' => [
                'format' => 'STD?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
}
