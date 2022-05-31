<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Product.index', [
            'products' => Product::latest()->filter(request(['search']))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create', [
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'  => 'required',
            'supplier_id'  => 'required',
            'product_name' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image'))
        {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedData);

        return redirect('/product')->with('success', 'New product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('Product.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id'  => 'required',
            'supplier_id'  => 'required',
            'product_name' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        Product::where('id', $id)->update($validatedData);

        return redirect('/product')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/product')->with('success', 'Product deleted successfully!');
    }
}
