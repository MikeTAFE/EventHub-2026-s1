<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    public function index()
    {
        // Get all events from the database (TODO: paging...)
        // $events = Event::where("name", "Jazz Festival")->get();
        // $events = Event::where("name", "like", "%jazz%")->get();
        $events = Event::all();

        // Pass data into the view
        return view('events.index', ["events" => $events]);
    }

    /**
     * Display details of a single event
     *
     * @param integer $id Event ID
     */
    public function show(int $id)
    {
        // Find event details (404 error if not found)
        $event = Event::findOrFail($id);

        // Pass data into the view
        return view('events.show', ["event" => $event]);
    }

    /**
     * Display events matching search query
     *
     * @param Request $request HTTP request object
     */
    public function search(Request $request)
    {
        // Get the user "query" passed via query string
        $searchTerm = $request->input("query");

        // Search for events using the search term IF one was provided
        // ->when() conditionally runs the next bit of code
        $events = Event::query()->when($searchTerm, function ($query, $search) {
            // Filter by "name"
            return $query->where("name", "like", "%{$search}%")
                         ->orWhere("location", "like", "%{$search}%");
        })->get();

        // Pass data into the view
        return view('events.search', ["events" => $events, "searchTerm" => $searchTerm]);
    }

    /**
     * Save an event to session memory
     *
     * @param integer $id Event ID
     */
    public function save(int $id)
    {
        // Get the current list of saved events (from session)
        // Default to empty list
        // $savedEvents = session()->get("saved_events", []);
        $savedEvents = Session::get("saved_events", []);
        
        // Add the new event ID to the list (if it's not already there)
        if (!in_array($id, $savedEvents)) {
            $savedEvents[] = $id;
        }

        // Save the updated list (into session)
        // session()->put("saved_events", $savedEvents);
        Session::put("saved_events", $savedEvents);

        // Redirect user back where they came from
        return redirect()->back()->with("success", "Event saved! 🎟");
    }

    /**
     * Remove an event from session memory
     *
     * @param integer $id Event ID
     */
    public function unsave(int $id)
    {
        // Get the current list of saved events (from session)
        $savedEvents = Session::get("saved_events", []);
        
        // Remove event ID from the list (ONLY if it exists)
        if (($key = array_search($id, $savedEvents)) !== false) {
            unset($savedEvents[$key]);
        }

        // Condense the array to cover the gap of the missing value
        $savedEvents = array_values($savedEvents);

        // Save the updated list (into session)
        Session::put("saved_events", $savedEvents);

        // Redirect user back where they came from
        return redirect()->back()->with("message", "Event unsaved.");
    }

    /**
     * Display a listing of saved events
     */
    public function showSaved()
    {
        // Get saved event IDs from session
        $savedEventIds = Session::get("saved_events", []);

        // Fetch the actual events from the DB
        $events = Event::whereIn("id", $savedEventIds)->get();

        // Pass data into the view
        return view('events.saved', ["events" => $events]);
    }
}
