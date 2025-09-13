<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    public function Deal()
    {
        return $this->belongsTo(Client::class);
    }
}
