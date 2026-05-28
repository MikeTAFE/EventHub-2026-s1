<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display details of a single category
     *
     * @param integer $id Category ID
     */
    public function show(int $id)
    {
        // Find category details (404 error if not found)
        $category = Category::findOrFail($id);

        // Find all events in the category
        $events = Event::where("category_id", $id)->get();

        // Pass data into the view
        return view('show_category', ["category" => $category, "events" => $events]);
    }
}
