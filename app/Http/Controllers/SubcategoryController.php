<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function create() 
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categorie'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_category' => 'required|exists:categories,id',
            'subcategory_name' => 'required|string|max:255|unique:subcategories',
        ]);

        Subcategory::create([
            'category_id' => $data['parent_category'],
            'subcategory_name' => $data['subcategory_name'],
        ]);

        // Redirect back to the subcategory index page.
        return redirect()->back()->with('success', 'Subcategory added successfully!');
    }
}
