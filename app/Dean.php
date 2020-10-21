<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dean extends Model
{
    protected $fillable = ['id_dean','lecturer_id','faculty_id','start_at','end_at'];
    protected $primaryKey = 'id_dean';
    public $incrementing = false;

    public function faculty (){
        return $this->belongsTo(Faculty::class,'faculty_id','id_faculty');
    }

    public function lecturer (){
        return $this->belongsTo(Lecturer::class, 'lecturer_id','id_lecturer');
    }
}
