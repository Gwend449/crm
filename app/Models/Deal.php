<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];
    protected $fillable = [
        'client_id',
        'service_name',
        'price',
        'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
