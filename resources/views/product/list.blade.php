    @extends('master')
    @section('title', 'List Categories')
    @section('content')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    List-product
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <a class="btn btn-success mb-2" href="{{ route('product.create') }}">ADD</a>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $key => $product)
                                                    <tr>
                                                        <td>{{ $key + 1}}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>
                                                            @if ($product->image)
                                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                                    alt="{{ asset('storage/' . $product->image) }}"
                                                                    style="width: 150px">
                                                            @else
                                                                {{ 'chưa có ảnh ' }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $product->price }}</td>
                                                        <td> <a href="{{ route('product.edit', $product->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form method="post"
                                                                action="{{ route('product.delete', $product->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div class="d-flex justify-content-end mt-3">
                                            {{ $products->links() }}
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    @endsection
