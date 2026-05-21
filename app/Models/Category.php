<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * Get events for the category.
     *
     * @return HasMany Collection of events
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
