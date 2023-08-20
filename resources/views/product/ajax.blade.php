<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#parent_category').change(function() {
            var categoryId = $(this).val();
            if (categoryId !== '') {
                $.ajax({
                    url: '{{ route('getSubcategories') }}',
                    method: 'GET',
                    data: { category_id: categoryId },
                    success: function(data) {
                        $('#subcategory').prop('disabled', false);
                        $('#subcategory').html(data);
                    }
                });
            } else {
                $('#subcategory').prop('disabled', true).html('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>
