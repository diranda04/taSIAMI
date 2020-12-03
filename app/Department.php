<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Department extends Model
{
    protected $fillable = ['id_department','department_name', 'faculty_id', 'accreditation', 'sk_num'];
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

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_department' => [
                'format' => 'PS-UA?',
                'length' => 3
            ]
        ];
    }
}
