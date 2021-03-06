<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Auditee extends Model
{
    protected $fillable = ['id_auditee','user_id','department_id','start_at','end_at'];
    protected $primaryKey = 'id_auditee';
    public $incrementing = false;

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id_department');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function audit(){
        return $this->hasOne(Audit::class,'department_id', 'department_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_auditee' => [
                'format' => 'KP-UA-?',
                'length' => 3
            ]
        ];
    }
}
