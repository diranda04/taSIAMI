<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

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

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_faculty' => [
                'format' => 'FUA?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }

}

