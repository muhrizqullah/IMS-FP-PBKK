@extends('Layouts.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories List</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/category">
                    <div class="input-group mb-3">
                        <input name="search" type="text" class="form-control" placeholder="Search" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        
        @if($categories->count())
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $category->category_name }}
                                        </td>
                                        <td>
                                            <form class="d-inline" action="/category/{{ $category->id }}/edit">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            <form class="d-inline" action="/category/{{ $category->id }}" method="POST">
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
