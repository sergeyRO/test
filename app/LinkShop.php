<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkShop extends Model
{
    protected $table = 'linkshop';
    protected $fillable = ['book_id', 'shop_id','created_at','updated_at'];
    public function shop()
    {
        return $this->belongsTo(Shops::class);
    }
    public function book()
    {
        return $this->belongsTo(Books::class);
    }
}
