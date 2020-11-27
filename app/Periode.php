<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Periode extends Model
{
    protected $fillable = ['id_periode', 'book_id', 'audit_start_at', 'audit_end_at'];
    protected $primaryKey = 'id_periode';
    public $incrementing = false;


    public function book (){
        return $this->belongsTo(Book::class,'book_id','id_book');
    }
    public function Instrument(){
        return $this->hasMany(AuditInstrument::class);
    }
    public function audit(){
        return $this->hasMany(Audit::class);
    }
    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_periode' => [
                'format' => 'P-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
}
