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
        return $this->hasMany(Question::class, 'standard_component_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_standard_component' => [
                'format' => 'KS-?',
                'length' => 3 
            ]
        ];
    }
}
