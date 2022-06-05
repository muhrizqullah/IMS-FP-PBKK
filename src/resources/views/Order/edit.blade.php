@extends('Layouts.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Edit Order</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/order">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
        </ol>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-15">
                            <div class="login-form">
                                {{-- Alert Registration Success End --}}
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Order</h1>
                                </div>
                                <form method="POST" action="/order/{{  $order->id }}">
                                    @method('put')
                                    @csrf
                                    <!-- New Order -->
                                    <div class="col-xl-13">
                                        <div class="card">
                                            <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-light">New Order</h6>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Qty.</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order_details as $order_detail)
                                                            <tr>
                                                                <td>
                                                                    {{ $order_detail->Product->product_name }}
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $order_detail->quantity) }}" required>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @money(intval($order_detail->Product->selling_price))
                                                                </td>
                                                                <td>
                                                                    <form class="d-inline" action="/order-details/{{ $order_detail->id }}" method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text">Total Quantity</h6>
                                                <h6 class="m-0 font-weight-bold text">{{ $order->total_quantity }}</h6>
                                            </div>
                                            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text">Total Sales</h6>
                                                <h6 class="m-0 font-weight-bold text">{{ $order->total_sales }}</h6>
                                            </div>
                                            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text">Total Profits</h6>
                                                <h6 class="m-0 font-weight-bold text">{{ $order->total_profits }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection