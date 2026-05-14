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
}
