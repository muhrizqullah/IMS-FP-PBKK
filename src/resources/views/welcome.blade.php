@extends('Layouts.main')
@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Today Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 150.000</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
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
        <div class="col-xl col-lg-7 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Total Penjualan</th>
                                <th>Total Item</th>
                                <th>Keuntungan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">1</a></td>
                                <td>Rp. 150.000</td>
                                <td>5</td>
                                <td>Rp. 10.000</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">2</a></td>
                                <td>Rp. 150.000</td>
                                <td>5</td>
                                <td>Rp. 10.000</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">3</a></td>
                                <td>Rp. 150.000</td>
                                <td>5</td>
                                <td>Rp. 10.000</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">4</a></td>
                                <td>Rp. 150.000</td>
                                <td>5</td>
                                <td>Rp. 10.000</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">5</a></td>
                                <td>Rp. 150.000</td>
                                <td>5</td>
                                <td>Rp. 10.000</td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
@endsection