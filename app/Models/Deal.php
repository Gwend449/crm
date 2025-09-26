<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'service_name',
        'comment',
        'price',
        'date',
        'status'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($deal) {
            if (!$deal->date) {
                $deal->date = now();
            }

            if (!$deal->status) {
                if (!$deal->status) {
                    $deal->status = 'new';
                }
            }
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
