<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // Allow mass assignment (multiple property values at once)
    protected $fillable = [
        'customer_name',
        'customer_email',
        'comments',
        'event_id',
    ];

    // Cast fields as specific data types
    protected $casts = [
        'event_id' => 'integer',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
