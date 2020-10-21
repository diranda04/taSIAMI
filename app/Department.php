<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['id_department','name', 'faculty_id', 'accreditation', 'sk_num'];
    protected $primaryKey = 'id_department';
    public $incrementing = false;

    public function auditee (){
        return $this->hasMany(Auditee::class);
    }
    public function audit(){
        return $this->hasMany(Audit::class, 'department_id', 'id_department');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id_faculty');
    }

}
