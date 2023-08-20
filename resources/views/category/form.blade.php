<form method="post" action="{{ route('category.store') }}">
    @csrf
    <label for="category_name">Category Name:</label>
    <input type="text" name="name" required>
    
    <button type="submit">Add Category</button>
</form>
