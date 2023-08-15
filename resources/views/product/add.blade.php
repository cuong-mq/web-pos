@extends('master')
@section('title', 'Add Product')
@section('content')

    <div class="col-12 col-md-12 mt-2">
        <div class="col-12 col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Add Product
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
                            @csrf
                            <!-- Thêm CSRF token để bảo mật form -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)" name="image">
                                <img id="show_info" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a type="button" href="{{ route('product.index') }}" class="btn btn-secondary">Exit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script type="text/javascript">
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('show_info');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
