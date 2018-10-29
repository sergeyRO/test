<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres';
    public $timestamps = false;
    protected $fillable = ['genre'];
    public function book()
    {
        return $this->belongsTo(Books::class);
    }
}
