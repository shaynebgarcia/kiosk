<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function POS()
    {
    	return $this->belongsTo(POS::class, 'pos_id');
    }

    public function lines()
    {
    	return $this->hasMany(OrderLine::class, 'order_id');
    }

    public function payment_type()
    {
    	return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }
}
