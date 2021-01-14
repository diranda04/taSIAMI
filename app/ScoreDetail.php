<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class ScoreDetail extends Model
{
    protected $fillable = ['id_score_detail','question_id','score','desc'];
    protected $primaryKey = 'id_score_detail';
    public $incrementing = false;

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id_question');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_score_detail' => [
                'format' => 'D-'.date('Y').'-?',
                'length' => 3
            ]
        ];
    }
}
