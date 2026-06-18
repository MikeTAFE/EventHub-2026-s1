<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all events from DB
        $events = Event::all();

        // Load admin index view
        return view('admin.events.index', ["events" => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all categories from DB
        $categories = Category::all();
        
        // Load the create/add form
        return view('admin.events.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data (errors will cause errors to be sent back to the form)
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'location' => 'nullable|min:2|max:50',
            'price' => 'required|numeric|min:0|max:999999',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,webp|max:2048', // Max 2MB
            'featured' => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Set a default "false" value for "featured"
        $validated["featured"] = $validated["featured"] ?? false;

        // Check if image uploaded
        if ($request->hasFile("image")) {
            
            // // Save image to "public/images/events" (using Storage facade)
            // $path = $request->file("image")->store("images/events", "public");
            // $validated["image"] = $path;

            // EXAMPLE: FOR EDIT FUNCTIONALITY (delete image if new one given)
            // If using Storage facade and public/storage
            // Storage::disk("public")->delete($event->image);
            // If using full filepaths
            // Storage::delete(public_path('images/events/' . $event->image));

            // Save image to "public/images/events" (basic file move)
            $file = $request->file("image");
            $filename = $file->getClientOriginalName(); // Consider making unique
            $file->move(public_path('images/events/'), $filename);

            // Make sure filename goes into DB
            $validated["image"] = $filename;
        }

        // Create the event
        Event::create($validated);

        // Redirect user
        return redirect()->route("admin.events.index")->with("success", "Event created! ✔");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Get all categories from DB
        $categories = Category::all();
        
        // Load the edit form
        return view('admin.events.edit', compact("event", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Convert boolean form values
        $request->merge([
            'featured' => $request->boolean('featured')
        ]);

        // Validate input data (errors will cause errors to be sent back to the form)
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'location' => 'nullable|min:2|max:50',
            'price' => 'required|numeric|min:0|max:999999',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,webp|max:2048', // Max 2MB
            'featured' => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Check if image uploaded
        if ($request->hasFile("image")) {
            
            // Delete old image (using Storage facade and public/storage)
            // Storage::disk("public")->delete($event->image);
            
            // Delete old image (basic filepaths)
            Storage::delete(public_path('images/events/' . $event->image));

            // Save image (basic file move)
            $file = $request->file("image");
            $filename = $file->getClientOriginalName(); // Consider making unique
            $file->move(public_path('images/events/'), $filename);

            // Make sure filename goes into DB
            $validated["image"] = $filename;
        }

        // Update the event
        $event->update($validated);

        // Redirect user
        return redirect()->route("admin.events.index")->with("success", "Event updated! ✔");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Check if event has registrations linked
        $hasRegistrations = Registration::where('event_id', $event->id)->exists();

        // If there are registrations - redirect with error
        if ($hasRegistrations)
        {
            return redirect()->route("admin.events.index")->with("error", "Event has linked registrations! ❌");
        }

        // Delete the event
        $event->delete();

        // Redirect user
        return redirect()->route("admin.events.index")->with("success", "Event deleted! ✔");
    }
}
