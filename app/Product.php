<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
    	return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
    public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }
    public function stocks()
    {
    	return $this->hasMany(Stock::class);
    }
}
