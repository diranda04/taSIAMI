<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['id_lecturer','address','telephone'];
    protected $primaryKey = 'id_lecturer';
    public $incrementing = false;

    public function dean(){
        return $this->hasMany(Dean::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_lecturer','id');
    }

    public function auditee(){
        return $this->hasMany(Auditee::class,'lecturer_id', 'id_lecturer');
    }
}
