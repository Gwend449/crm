<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function client()
    {
        return $this->hasMany(Deal::class);
    }
}
