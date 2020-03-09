<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
	public function getTitleUpperAttribute()
	{
		return strtoupper("{$this->title}");
	}
}
