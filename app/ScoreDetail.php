<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreDetail extends Model
{
    protected $fillable = ['id_score_detail','question_id','score','desc'];

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id_question');
    }
}
