<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Periode extends Model
{
    protected $fillable = ['id_periode', 'instrument_id', 'audit_start_at', 'audit_end_at'];
    protected $primaryKey = 'id_periode';
    public $incrementing = false;


    public function book (){
        return $this->belongsTo(Book::class,'book_id','id_book');
    }

    public function instrument (){
        return $this->belongsTo(Instrument::class,'instrument_id','id_instrument');
    }

    public function audit(){
        return $this->hasMany(Audit::class);
    }
    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_periode' => [
                'format' => 'P-?',
                'length' => 3
            ]
        ];
    }
}
