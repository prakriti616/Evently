<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'category',
        'event_date',
        'event_time',
        'location',
        'description',
        'organizer',
        'price',
        'image',
    ];

    protected $casts = [
        'event_date' => 'date',
        'price' => 'decimal:2',
    ];
}