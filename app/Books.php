<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    public $timestamps = false;
    protected $fillable = ['name', 'comments','pages','summa','genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genres::class);
    }
}
