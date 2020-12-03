<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Instrument extends Model
{
    protected $fillable = ['id_instrument', 'instrument_name'];
    protected $primaryKey = 'id_instrument';
    public $incrementing = false;

    public function standard()
    {
        return $this->hasMany(Standard::class,'instrument_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id_book');
    }

    public function periode (){
        return $this->hasMany(Periode::class,'instrument_id');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_instrument' => [
                'format' => 'AI?',
                'length' => 3
            ]
        ];
    }
}
