<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Dean extends Model
{
    protected $fillable = ['id_dean','user_id','faculty_id','start_at','end_at'];
    protected $primaryKey = 'id_dean';
    public $incrementing = false;

    public function faculty (){
        return $this->belongsTo(Faculty::class,'faculty_id','id_faculty');
    }

    public function user (){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_dean' => [
                'format' => 'DEAN-?',
                'length' => 3
            ]
        ];
    }
}
