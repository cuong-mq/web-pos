$(document).ready(function () {
    var selectedCategoryName = "";
    function loadListCategories() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8000/api/postajax/list',
            dataType: 'json',
            success: function (res) {
                var categorySelect = $(".categorySelect");
                $.each(res, function (index, category) {   //?????
                    var option = $("<option></option>").attr("value", category.id)
                        .text(category.name);
                    if (selectedCategoryName === category.name) {
                        option.attr("selected", true);
                    }
                    categorySelect.append(option);
                });
            }
        });
    }

    $('#categorySelect').change(function () {
        selectedCategoryName = $("#categorySelect option:selected").text();
    });

    loadListCategories();

    function loadPosts(category_id) {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8000/api/postajax/index',
            data: {
                category_id: category_id
            },
            dataType: 'json',
            success: function (res) {
                var startStt = 1;
                $('#post-table-body').empty();
                res.forEach(function (post, index) {
                    $('#post-table-body').append(`
                        <tr>
                            <td>${startStt + index}</td>
                            <td>${post.name}</td>
                            <td>${post.category.name}</td>
                            <td>${post.slug}</td>
                            <td>${post.description}</td>
                            <td>${post.content}</td>
                            <td><a class="btn btn-primary btn-sm edit-post-button" data-id="${post.id}">Edit</a></td>
                            <td><a class="btn btn-danger btn-sm delete-post-button" data-id="${post.id}">Delete</a></td>
                            </tr>
                    `);
                });
            }
        });
    }

    $('#load-posts').click(function () {
        let category_id = $('#categorySelect').val()
        loadPosts(category_id);
    });

    $('#add-post-button').click(function () {
        $('#addPostModal').modal('show');
    });

    $('#add-post-form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/postajax/store',
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#addPostModal').modal('hide');
                loadPosts();
                document.getElementById("add-post-form").reset();
            }
        });
    });

    $(document).on('click', '.edit-post-button', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `http://localhost:8000/api/postajax/${id}/edit`,
            dataType: 'json',
            success: function (post) {
                $('#edit-post-id').val(post.id);
                $('#edit-name').val(post.name);
                $('#edit-slug').val(post.slug);
                $('#edit-description').val(post.description);
                $('#edit-content').val(post.content);
                $('#edit-categorySelect').val(post.category_id);
                $('#editPostModal').modal('show');
            }
        });
    });

    $('#edit-post-form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var id = $('#edit-post-id').val();
        $.ajax({
            type: 'PUT',
            url: 'http://localhost:8000/api/postajax/update/' + id,
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#editPostModal').modal('hide');
                loadPosts();
            }
        });
    });

    $(document).on('click', '.delete-post-button', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'DELETE',
            url: `http://localhost:8000/api/postajax/delete/` + id,
            dataType: 'json',
            success: function (post) {
                loadPosts();
            }
        });
    });


});
