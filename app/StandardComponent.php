<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class StandardComponent extends Model
{
    protected $fillable = ['id_standard_component','desc','standard_id'];
    protected $primaryKey = 'id_standard_component';
    public $incrementing = false;

    public function standard()
    {
        return $this->belongsTo(Standard::class,'standard_id','id_standard');
    }

    public function question(){
        return $this->hasMany(Question::class);
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_standard_component' => [
                'format' => 'KS-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
}
