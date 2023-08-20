<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() 
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'parent_category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:subcategories,id', 
            'product_description' => 'nullable|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create([
            'product_name' => $data['product_name'],
            'parent_category_id' => $data['parent_category'],
            'subcategory_id' => $data['subcategory'],
            'product_description' => $data['product_description'],
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price'],
        ]);

        foreach ($data['images'] as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product->images()->create([
                'image_path' => $imageName,
            ]);
        }

        // We can redirect to the index page of the product, where we are listing them.
        return redirect()->route('home')->with('success', 'Product created successfully!');
    }


    public function getSubcategories(Request $request)
    {
        $category_id = $request->input('category_id');
        $subcategories = Subcategory::where('category_id', $category_id)->get();

        $options = '<option value="">Select Subcategory</option>';
        foreach ($subcategories as $subcategory) {
            $options .= '<option value="' . $subcategory->id . '">' . $subcategory->subcategory_name . '</option>';
        }

        return $options;
    }
}
