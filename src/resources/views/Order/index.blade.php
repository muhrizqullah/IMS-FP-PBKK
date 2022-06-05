@extends('Layouts.main')
@section('container')
{{-- Alert New Order Success Start --}}
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ session('success') }}
</div>
@endif
{{-- Alert New Order Success End --}}

<div class="container">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Orders List</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/order">Orders</a></li>
        <li class="breadcrumb-item active" aria-current="page">Orders List</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Orders List</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    @if($orders->count())
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
                                    <form class="d-inline" action="/order/{{ $order->id }}/edit">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                    </form>
                                    <form class="d-inline" action="/order/{{ $order->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
        </div>
    </div>
</div>
</div>

@endsection