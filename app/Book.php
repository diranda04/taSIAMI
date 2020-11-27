<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Book extends Model
{
    protected $fillable = ['id_book','book_name'];
    protected $primaryKey = 'id_book';
    public $incrementing = false;

    public function Instrument(){
        return $this->hasMany(Instrument::class,'book_id');
    }
    public function periode (){
        return $this->hasMany(Periode::class,'book_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_book' => [
                'format' => 'AIB-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 2 // The number of digits in an autonumber
            ]
        ];
    }
}
