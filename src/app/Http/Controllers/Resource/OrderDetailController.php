<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($order_id = session('order_id'))
        {
            $total_sales = 0;
            
            return view('OrderDetail.index',[
                'products' => Product::orderBy('product_name')->get(),
                'order_details' => OrderDetail::where('order_id', '=', $order_id)->orderBy('id')->get(),
                'order_id' => $order_id,
                'total_sales' => $total_sales
            ]);
        }   
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
            'order_id'  => 'required',
            'product_id'  => 'required',
            'quantity'  => 'required'
        ]);
        
        $product = Product::where('id', '=', $validatedData['product_id'])->first();
        $check = OrderDetail::where('order_id', '=', $validatedData['order_id'])
                            ->where('product_id', '=', $validatedData['product_id'])->first();

        $quantity = isset($check['quantity']) ? $check['quantity'] : '0';
        if($product['quantity'] > $quantity)
        {

            if($check)
            {
                $validatedData['quantity'] = intval($check['quantity']) + 1;
                
                OrderDetail::where('id', $check['id'])->update($validatedData);
            }
            else
            {
                OrderDetail::create($validatedData);
            }
            return redirect('/order-detail')->with('success', 'New product added successfully!');
        }
        else
        {
            return redirect('/order-detail')->with('failed', 'Out of Stock!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        $validatedData = $request->validate([
            'order_id'  => 'required',
            'product_id'  => 'required',
            'quantity'  => 'required|min:1'
        ]);
        
        $product = Product::where('id', '=', $validatedData['product_id'])->first();

        if($product['quantity'] >= $validatedData['quantity'] && $validatedData['quantity'] > 0)
        {
            OrderDetail::where('id', $orderDetail->id)->update($validatedData);
            return redirect('/order-detail')->with('success', 'Product added successfully!');
        }
        else
        {
            return redirect('/order-detail')->with('failed', 'Check Stock!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderDetail::destroy($id);

        return redirect('/order-detail')->with('success', 'Product deleted successfully!');
    }
}
