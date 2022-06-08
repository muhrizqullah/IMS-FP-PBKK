@extends('Layouts.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Profits</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">@money($today_orders->sum('total_profits'))</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today_orders->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dolly fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Categories</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $category_count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-archive fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product_count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="col-lg-12 mb-3">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
                        <a class="m-0 float-right btn btn-danger btn-sm" href="/order">View More <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            @if ($orders->count())
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Total Sales</th>
                                        <th>Total Item</th>
                                        <th>Profits</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                @money($order->total_sales)
                                            </td>
                                            <td>
                                                {{ $order->total_quantity }}
                                            </td>
                                            <td>
                                                @money($order->total_profits)
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>
                                            <td>
                                                <form class="d-inline" action="/order/{{ $order->id }}"
                                                    method="GET">
                                                    @csrf
                                                    <button class="btn btn-sm btn-info">Show</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p class="text-center fs-4">Not Found!</p>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <!-- Warning Products -->
            <div class="col-lg-12 mb-3">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Low Quantity products</h6>
                        <a class="m-0 float-right btn btn-danger btn-sm" href="/product">View More <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            @if ($warning_products->count())
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Qty.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warning_products as $product)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $product->product_name }}
                                            </td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->product_name }}" height="48">
                                                @else
                                                    <img src="{{ asset('storage/product-alt.png') }}"
                                                        alt="{{ $product->product_name }}" height="48">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $product->category->category_name }}
                                            </td>
                                            <td>
                                                {{ $product->supplier->name }}
                                            </td>
                                            <td>
                                                @money($product->buying_price)
                                            </td>
                                            <td>
                                                @money($product->selling_price)
                                            </td>
                                            <td class="text-danger">
                                                {{ $product->quantity }}
                                            </td>
                                            <td>
                                                <form class="d-inline" action="/product/{{ $product->id }}/edit">
                                                    @csrf
                                                    <button class="btn btn-sm btn-primary">Edit</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p class="text-center fs-4">Not Found!</p>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
