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

        <div class="row">
            <!-- New Order -->
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light">Order Details</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Qty.</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_details as $item)
                                    <tr>
                                        <td>
                                            @if($item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->product_name  }}" height="48">
                                            @else
                                                <img src="{{ asset('storage/product-alt.png') }}"
                                                alt="{{ $item->product->product_name  }}" height="48">
                                        @endif
                                        </td>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Admin</h6>
                        <h6 class="m-0 font-weight-light text">{{ $order->user->name }}</h6>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total Sales</h6>
                        <h6 class="m-0 font-weight-light text">@money($order->total_sales)</h6>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total Profits</h6>
                        <h6 class="m-0 font-weight-light text">@money($order->total_profits)</h6>
                    </div>
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text">Total Quantity</h6>
                        <h6 class="m-0 font-weight-light text">{{ $order->total_quantity }}</h6>
                    </div>
                </div>
            </div>
            <!-- New Order -->
        </div>
    </div>
@endsection