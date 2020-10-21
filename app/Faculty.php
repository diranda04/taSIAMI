<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['id_faculty','name'];
    protected $primaryKey = 'id_faculty';
    public $incrementing = false;

    public function dean (){
        return $this->hasMany(Dean::class,'faculty_id');
    }

    public function department(){
        return $this->hasMany(Department::class);
    }

}

