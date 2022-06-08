@extends('Layouts.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/product">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                                </div>
                                <form method="POST" action="/product/{{  $product->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="product_name" placeholder="Enter Product Name " value="{{ old('product_name', $product->product_name) }}" autofocus required>
                                        @error('product_name')<div id="validationproduct_name" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                @if(old('category_id', $product->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="supplier">Supplier</label>
                                        <select class="form-control" name="supplier_id">
                                            @foreach($suppliers as $supplier)
                                            @if(old('supplier_id', $product->supplier_id) == $supplier->id)
                                                <option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
                                            @else
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="buying_price" class="form-control @error('buying_price') is-invalid @enderror" id="buying_price" placeholder="Enter Buying Price " value="{{ old('buying_price', $product->buying_price) }}" autofocus required>
                                        @error('buying_price')<div id="validationbuying_price" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" placeholder="Enter Selling Price " value="{{ old('selling_price', $product->selling_price) }}" autofocus required>
                                        @error('selling_price')<div id="validationphone" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Enter Quantity " value="{{ old('quantity', $product->quantity) }}" autofocus required>
                                        @error('quantity')<div id="validationquantity" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="image">Upload Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"  id="image" name="image">
                                        @error('image')<div id="validationimage" class="invalid-feedback">{{ $message }}</div>@enderror
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