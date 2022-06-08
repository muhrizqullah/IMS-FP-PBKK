@extends('Layouts.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Suppliers List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/supplier">Suppliers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Suppliers List</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/supplier">
                    <div class="input-group mb-3">
                        <input name="search" type="text" class="form-control" placeholder="Search" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        
        @if($suppliers->count())
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Suppliers List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $supplier->name }}
                                        </td>
                                        <td>
                                            {{ $supplier->email }}
                                        </td>
                                        <td>
                                            {{ $supplier->phone }}
                                        </td>
                                        <td>
                                            {{ $supplier->address }}
                                        </td>
                                        <td>
                                            <form class="d-inline" action="/supplier/{{ $supplier->id }}/edit">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            <form class="d-inline" action="/supplier/{{ $supplier->id }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>

    @else
    <p class="text-center fs-4">Not Found!</p>
    @endif
@endsection
