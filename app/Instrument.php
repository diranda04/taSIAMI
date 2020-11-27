<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    protected $fillable = ['standard_id', 'book_id'];



    public function standard()
    {
        return $this->belongsTo(Standard::class,'standard_id','id_standard');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id_book');
    }

    
}
