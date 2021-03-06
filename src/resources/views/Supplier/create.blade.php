@extends('Layouts.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Supplier</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/supplier">Suppliers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Supplier</li>
        </ol>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                {{-- Alert Registration Success End --}}
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create Supplier</h1>
                                </div>
                                <form method="POST" action="/supplier">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name " value="{{ old('name') }}" autofocus required>
                                        @error('name')<div id="validationname" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email " value="{{ old('email') }}" autofocus required>
                                        @error('email')<div id="validationemail" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone Number " value="{{ old('phone') }}" autofocus required>
                                        @error('phone')<div id="validationphone" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address " value="{{ old('address') }}" autofocus required>
                                        @error('address')<div id="validationaddress" class="invalid-feedback">{{ $message }}</div>@enderror
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