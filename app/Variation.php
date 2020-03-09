<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $guarded = ['id'];

    public function stock()
    {
    	return $this->belongsTo(Stock::class, 'variation_id');
    }
}
