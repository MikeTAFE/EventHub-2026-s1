<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    /**
     * Get category for the event.
     *
     * @return BelongsTo Category for event
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
