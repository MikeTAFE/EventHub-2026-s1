<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    public function index()
    {
        // Define event list
        $events = [
            "Sydney Music Fest",
            "Melbourne Tech Expo",
            "Brisbane Food Carnival",
        ];

        // Pass data into the view
        return view('home', ["events" => $events]);
    }

    /**
     * Display details of a single event
     *
     * @param integer $id Event ID
     */
    public function show(int $id)
    {
        // Define event list (full details)
        $events = [
            1 => [
                "name" => "Sydney Music Fest",
                "city" => "Sydney",
            ],
            2 => [
                "name" => "Melbourne Tech Expo",
                "city" => "Melbourne",
            ],
            3 => [
                "name" => "Brisbane Food Carnival",
                "city" => "Brisbane",
            ],
        ];

        // Return error if event does not exist
        if (!isset($events[$id])) {
            // Trigger 404 error page (with message)
            return abort(404, "Event '$id' could not be found.");
        }

        // Pass data into the view
        return view('show_event', ["event" => $events[$id]]);
    }
}
