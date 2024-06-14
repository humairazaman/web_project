<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode_number',
        'duration',
        'type',
        'sponsored_by',
        'associated_by',
    ];

    // Relationship with Drama
    public function drama()
    {
        return $this->belongsTo(Drama::class);
    }
}
