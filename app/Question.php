<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

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

    public function nilaiFromAudit($id_audit)
    {
        return $this->hasOne(AuditScore::class, 'question_id','id_question')->where('audit_id',$id_audit);
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_question' => [
                'format' => 'Q?',
                'length' => 4
            ]
        ];
    }
}
