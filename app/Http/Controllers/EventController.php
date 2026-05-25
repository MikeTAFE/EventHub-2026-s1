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
        return view('events', ["events" => $events]);
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
        return view('show_event', ["event" => $event]);
    }
}
