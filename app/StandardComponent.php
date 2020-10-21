<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
