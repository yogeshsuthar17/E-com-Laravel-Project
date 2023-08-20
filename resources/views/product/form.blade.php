<form method="post" action="{{ route('product.store') id="productForm" enctype="multipart/form-data">
    @csrf
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required>

    <label for="parent_category">Parent Category:</label>
    <select id="parent_category" name="parent_category">
        <option value="">Select Parent Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <label for="subcategory">Subcategory:</label>
    <select id="subcategory" name="subcategory" disabled>
        <option value="">Select Subcategory</option>
    </select>

    <label for="product_description">Product Description:</label>
    <textarea name="product_description"></textarea>

    <label for="regular_price">Regular Price:</label>
    <input type="number" name="regular_price" step="0.01" required>

    <label for="sale_price">Sale Price:</label>
    <input type="number" name="sale_price" step="0.01">

    <label for="images">Images:</label>
    <input type="file" name="images[]" multiple>

    <button id="submitBtn" type="button">Create Product</button>
</form>
