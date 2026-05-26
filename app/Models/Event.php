<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;

class Event extends Model
{
    // Allow mass assignment (multiple property values at once)
    protected $fillable = ['name', 'description', 'image', 'featured', 'category_id'];

    public function getImageUrl()
    {
        $imageUrl = public_path("images/events/" . $this->image);

    }

    /**
     * Defines a dynamic image_url property (Attribute Accessor)
     * Usage: $event->image_url
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            // Check if event has an image and if the file actually exists
            if ($this->image && File::exists(public_path('images/events/' . $this->image))) {
                return asset('images/events/' . $this->image);
            }

            // Fallback to a placeholder image
            return asset('images/placeholder-image.png');
        });
    }

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
