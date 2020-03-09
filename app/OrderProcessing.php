<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProcessing extends Model
{
    protected $guarded = ['id'];

    public function POS()
    {
    	return $this->belongsTo(POS::class, 'pos_id');
    }
    
    public function stock()
    {
    	return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function setTotalAttribute()
    {
        $this->attributes['total'] = $this->price * $this->qty;
    }
}
