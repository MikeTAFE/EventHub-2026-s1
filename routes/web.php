<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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


/*
 * Events
 */

// Use the "index" method of the EventController
Route::get('/events', [EventController::class, 'index'])->name("events.index");

// GET /events/3
Route::get('/events/{id}', [EventController::class, 'show'])->name("events.show");

// GET /search?query=abc
Route::get('/search', [EventController::class, 'search'])->name("events.search");

// POST /events/3/save
Route::post('/events/{id}/save', [EventController::class, 'save'])->name("events.save");

// POST /events/3/unsave
Route::post('/events/{id}/unsave', [EventController::class, 'unsave'])->name("events.unsave");

// GET /saved
Route::get('/saved', [EventController::class, 'showSaved'])->name("events.saved");

// GET /checkout
// Display the checkout form
Route::get('/checkout', function () {

    // Get the saved event IDs from the session
    $savedEventIds = Session::get("saved_events", []);

    // OPTIONAL: Get the actual events (from DB) if you want to display titles
    $events = Event::whereIn("id", $savedEventIds)->get();

    // Pass data into the view
    return view('events.checkout', ["savedEvents" => $events]);

})->name("events.checkout_form");

// POST /checkout
// Process the checkout form data
Route::post('/checkout', [EventController::class, 'checkout'])->name("events.checkout");


/*
 * Categories
 */

// Use the "index" method of the CategoryController
// Route::get('/categories', [CategoryController::class, 'index'])->name("categories.index");

// GET /categories/3
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name("categories.show");


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
