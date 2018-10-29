<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $table = 'shops';
    public $timestamps = false;
    protected $fillable = ['name','address'];
}
