@extends('Layouts.main')
@section('container')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Order</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/order">Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Order</li>
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
                                            <form class="d-inline" action="">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Add</button>
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

            <!-- New Order -->
            <div class="col-xl-6 col-lg-5">
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
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->product_name }}
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', 1) }}" required>
                                            </div>
                                        </td>
                                        <td>
                                            @money($product->selling_price)
                                        </td>
                                        <td>
                                            <form class="d-inline" action="">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total</h6>
                        <h6 class="m-0 font-weight-bold text">Rp.100.000</h6>
                    </div>
                </div>
            </div>
            <!-- New Order -->
        </div>
    </div>
@endsection