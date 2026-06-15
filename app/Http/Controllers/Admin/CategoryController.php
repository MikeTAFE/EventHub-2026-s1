<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all categories from DB
        $categories = Category::all();

        // Load admin index view
        // return view('admin.categories.index', compact("categories"));
        return view('admin.categories.index', ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Load the create/add form
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data (errors will cause errors to be sent back to the form)
        $validated = $request->validate([
            'name' => 'required|unique:categories|min:2|max:50',
        ]);

        // Create the category
        Category::create($validated);

        // Redirect user
        return redirect()->route("admin.categories.index")->with("success", "Category created! ✔");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // NOT IMPLEMENTED - we don't need "details"/show for categories (too simple)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Load the edit form
        return view('admin.categories.edit', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate input data (errors will cause errors to be sent back to the form)
        $validated = $request->validate([
            'name' => 'required|unique:categories|min:2|max:50',
        ]);

        // Update the category
        $category->update($validated);

        // Redirect user
        return redirect()->route("admin.categories.index")->with("success", "Category updated! ✔");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has events linked
        $hasEvents = Event::where('category_id', $category->id)->exists();

        // If there are events - redirect with error
        if ($hasEvents)
        {
            return redirect()->route("admin.categories.index")->with("error", "Category has linked events! ❌");
        }

        // Delete the category
        $category->delete();

        // Redirect user
        return redirect()->route("admin.categories.index")->with("success", "Category deleted! ✔");
    }
}
