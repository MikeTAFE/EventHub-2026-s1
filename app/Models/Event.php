<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class Event extends Model
{
    // Allow mass assignment (multiple property values at once)
    protected $fillable = [
        'name',
        'location',
        'price',
        'event_date',
        'description',
        'image',
        'featured',
        'category_id',
    ];

    // Cast fields as specific data types
    protected $casts = [
        'price' => 'decimal:2',
        'event_date' => 'datetime',
        'featured' => 'boolean',
        'category_id' => 'integer',
    ];


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
     * Defines a dynamic price_formatted property (Attribute Accessor)
     * Usage: $event->price_formatted
     */
    protected function priceFormatted(): Attribute
    {
        return Attribute::get(function () {
            // Check if event is free
            if ($this->price == 0) return 'Free';

            // Format as price
            return '$' . number_format($this->price, 2);
        });
    }
    

    /**
     * Defines a dynamic is_saved property (Attribute Accessor)
     * Usage: $event->is_saved
     */
    protected function isSaved(): Attribute
    {
        return Attribute::get(function () {
            
            // Get the current list of saved events (from session)
            $savedEvents = Session::get("saved_events", []);
            
            // Check if event is saved in the session
            return in_array($this->id, $savedEvents);
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
