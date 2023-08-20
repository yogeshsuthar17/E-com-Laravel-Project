<form method="post" action="{{ route('subcategory.store') }}">
    @csrf
    <label for="parent_category">Parent Category:</label>
    <select name="parent_category" required>
        <option value="">Select Parent Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <label for="subcategory_name">Subcategory Name:</label>
    <input type="text" name="subcategory_name" required>

    <button type="submit">Add Subcategory</button>
</form>
