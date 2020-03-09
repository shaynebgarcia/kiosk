<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KioskList extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kiosk()
    {
        return $this->belongsTo(Kiosk::class, 'kiosk_id');
    }
}
