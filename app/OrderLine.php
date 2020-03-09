<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $guarded = ['id'];

    public function order_detail()
    {
    	return $this->belongsTo(Order::class);
    }

    public function stock()
    {
    	return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function setTotalAttribute()
    {
        $this->attributes['total'] = $this->attributes['price'] * $this->attributes['qty'];
    }
}
