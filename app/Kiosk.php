<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    protected $guarded = ['id'];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }

    public function POSs()
    {
    	return $this->hasMany(POS::class);
    }
}
