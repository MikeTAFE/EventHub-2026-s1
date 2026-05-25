<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // write code...
// });


// Home
Route::get('/', function () {

    // Get featured events
    $featuredEvents = \App\Models\Event::where("featured", 1)->get();

    // View data
    $data = [
        "featuredEvents" => $featuredEvents
    ];

    return view('home', $data);
})->name("home");

// Events

// Use the "index" method of the EventController
Route::get('/events', [EventController::class, 'index'])->name("events.index");

// GET /events/3
Route::get('/events/{id}', [EventController::class, 'show'])->name("events.show");


/*
 * Static content pages
 */

Route::get('/about', function () {
    $data = [
        'username' => 'Kim',
        'rawHtml' => '<p>Here is some <strong>raw</strong> HTML for you!</p>',
        'nums' => [1, 6, 18, 4],
    ];
    return view('about', $data);
})->name("about");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/privacy', function () {
    return view('privacy');
})->name("privacy");
