<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['id_question','desc','standard_component_id'];
    protected $primaryKey = 'id_question';
    public $incrementing = false;


    public function standardComponent()
    {
        return $this->belongsTo(StandardComponent::class,'standard_component_id','id_standard_component');
    }

    public function auditScore(){
        return $this->hasMany(AuditScore::class, 'question_id','id_question');
    }

    public function scoreDetail(){
        return $this->hasMany(ScoreDetail::class);
    }

}
