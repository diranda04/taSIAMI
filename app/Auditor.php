<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $fillable = ['id_auditor','status','start_at'];
    protected $primaryKey = 'id_auditor';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class,'id_auditor','id');
    }

    public function departmentAudit(){
        return $this->hasMany(DepartmentAudit::class, 'auditor_id', 'id_auditor');
    }
}
