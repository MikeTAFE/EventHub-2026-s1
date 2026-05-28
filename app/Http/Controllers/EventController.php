<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
            return $query->where("name", "like", "%{$search}%");
        })->get();

        // Pass data into the view
        return view('events.search', ["events" => $events, "searchTerm" => $searchTerm]);
    }
}
