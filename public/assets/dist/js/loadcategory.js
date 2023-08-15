$(document).ready(function () {
    function loadCategories() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8000/api/categoriesajax',
            dataType: 'json',
            success: function (res) {
                var startStt = 1;
                $('#category-table-body').empty();
                res.forEach(function (category, index) {
                    $('#category-table-body').append(`
                        <tr>
                            <td>${startStt + index}</td>
                            <td>${category.name}</td>
                            <td>${category.slug}</td>
                            <td>${category.description}</td>
                            <td>${category.content}</td>
                            <td><a class="btn btn-primary btn-sm edit-category-button" data-id="${category.id}">Edit</a></td>
                            <td><a class="btn btn-danger btn-sm delete-category-button" data-id="${category.id}">Delete</a></td>

                            </tr>
                    `);
                });
            }
        });
    }

    $('#load-categories').click(function () {
        loadCategories();
    });

    $('#add-category-button').click(function () {
        $('#addCategoryModal').modal('show');
    });

    $('#add-category-form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/categoriesajax/store',
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#addCategoryModal').modal('hide');
                loadCategories();
                document.getElementById("add-category-form").reset();
            },
        });
    });

    $(document).on('click', '.edit-category-button', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `http://localhost:8000/api/categoriesajax/${id}/edit`,
            dataType: 'json',
            success: function (category) {
                $('#edit-category-id').val(category.id);
                $('#edit-name').val(category.name);
                $('#edit-slug').val(category.slug);
                $('#edit-description').val(category.description);
                $('#edit-content').val(category.content);
                $('#editCategoryModal').modal('show');
            }
        });
    });

    $('#edit-category-form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var id = $('#edit-category-id').val();
        $.ajax({
            type: 'PUT',
            url: 'http://localhost:8000/api/categoriesajax/update/' + id,
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#editCategoryModal').modal('hide');
                loadCategories();
            }
        });
    });

    $(document).on('click', '.delete-category-button', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'DELETE',
            url: `http://localhost:8000/api/categoriesajax/delete/` + id,
            dataType: 'json',
            success: function (category) {
                loadCategories();
            }
        });
    });

});
