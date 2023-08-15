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
                                    List-Category
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        {{-- <a class="btn btn-success mb-2" href="{{ route('category.create') }}">ADD</a> --}}
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Name</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listOrders as $key => $listOrder)
                                                    <tr>
                                                        <td>{{ $listOrders->firstItem() + $key }}</td>
                                                        <td>{{ $listOrder->customer_name }}</td>
                                                        <td>{{ $listOrder->total_amount }}</td>
                                                        <td>{{ $listOrder->order_date }}</td>
                                                        <td> <a 
                                                                class="btn btn-primary btn-sm">Detail</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end mt-3">
                                            {{ $listOrders->links() }}
                                        </div>
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