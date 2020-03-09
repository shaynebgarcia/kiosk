<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = ['id'];

    public function kiosk()
    {
    	return $this->belongsTo(Kiosk::class, 'kiosk_id');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id');
    }

    public function variations()
    {
    	return $this->hasMany(Variation::class, 'variation_id', 'variation_id');
    }
    
}
