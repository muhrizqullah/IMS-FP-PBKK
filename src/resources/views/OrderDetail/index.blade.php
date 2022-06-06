@extends('Layouts.main')
@section('container')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/order">Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Products -->
            <div class="col-xl-6 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                            <form action="/order/create">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control" placeholder="Search" value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                    </div>

                    <div class="table-responsive">
                        @if($products->count())
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->product_name }}
                                        </td>
                                        <td>
                                            @money($product->selling_price)
                                        </td>
                                        <td>
                                            {{ $product->quantity }}
                                        </td>
                                        <td>
                                            <form class="d-inline" method="POST" action="/order-detail">
                                                @csrf
                                                <input type="hidden" name="order_id" id="order_id" value="{{ $order_id }}">
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" id="quantity" value="1">
                                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="text-center fs-4">Not Found!</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Products End -->

            <!-- Order Details -->
            <div class="col-xl-6 col-lg-5">
                <div class="card">
                    <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light">Order Details</h6>
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
                                @foreach ($order_details as $item)
                                    <tr>
                                        <td>
                                            {{ $item->product->product_name }}
                                        </td>
                                        <td>
                                            <form>
                                                {{ $item->quantity }}
                                            </form>
                                        </td>
                                        <td>
                                            @money(intval($item->product->selling_price) * intval($item->quantity))
                                        </td>
                                        <td>
                                            <form class="d-inline" method="POST" action="/order-detail/{{ $item->id }}">
                                                @method('put')
                                                @csrf                                                
                                                <input type="hidden" name="order_id" id="order_id" value="{{ $order_id }}">
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $item->product->id }}">
                                                <input type="hidden" name="quantity" id="quantity" value="{{ intval($item->quantity) - 1 }}">
                                                <button class="btn btn-sm btn-info">-</button>
                                            </form>
                                            <form class="d-inline" method="POST" action="/order-detail/{{ $item->id }}">
                                                @method('put')
                                                @csrf                                                
                                                <input type="hidden" name="order_id" id="order_id" value="{{ $order_id }}">
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $item->product->id }}">
                                                <input type="hidden" name="quantity" id="quantity" value="{{ intval($item->quantity) + 1 }}">
                                                <button class="btn btn-sm btn-info">+</button>
                                            </form>
                                            <form class="d-inline" action="/order-detail/{{ $item->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total Sales</h6>
                        <h6 class="m-0 font-weight-light text">@money($total_sales)</h6>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total Profits</h6>
                        <h6 class="m-0 font-weight-light text">@money($total_profits)</h6>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total Quantity</h6>
                        <h6 class="m-0 font-weight-light text">{{ $total_quantity }}</h6>
                    </div>
                    <form class="d-inline" method="POST" action="/order/{{ $order_id }}">
                        @method('put')
                        @csrf                                                
                        <input type="hidden" name="total_sales" id="total_sales" value="{{ $total_sales }}">
                        <input type="hidden" name="total_quantity" id="total_quantity" value="{{ $total_quantity }}">
                        <input type="hidden" name="total_profits" id="total_profits" value="{{ $total_profits }}">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
            <!-- Order Details -->
        </div>
    </div>
@endsection