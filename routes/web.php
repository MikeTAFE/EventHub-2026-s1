<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // write code...
// });

// Use the "index" method of the EventController
Route::get('/', [EventController::class, 'index']);

Route::get('/about', function () {
    $data = [
        'username' => 'Kim',
        'rawHtml' => '<p>Here is some <strong>raw</strong> HTML for you!</p>',
        'nums' => [1, 6, 18, 4],
    ];
    return view('about', $data);
});
