<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drama extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'day',
        'time',
        'male_lead',
        'female_lead',
        'writter',
        'producer',
        'image',
    ];

    // Relationship with Episode
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
