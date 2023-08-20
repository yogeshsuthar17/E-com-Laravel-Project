<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create() 
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($data);

        // Rediect back to the category index page.
        return redirect()->back()->with('success', 'Category added successfully!');
    }
}