<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Define event list
    $events = [
        "Sydney Music Fest",
        "Melbourne Tech Expo",
        "Brisbane Food Carnival",
    ];

    // Pass data into the view
    return view('home', ["events" => $events]);
});

Route::get('/about', function () {
    $data = [
        'username' => 'Kim',
        'rawHtml' => '<p>Here is some <strong>raw</strong> HTML for you!</p>',
        'nums' => [1, 6, 18, 4],
    ];
    return view('about', $data);
});
