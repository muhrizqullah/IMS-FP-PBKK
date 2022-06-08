<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Core\Domain\Models\OrderDetail;
use App\Core\Domain\Models\Product;
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
            $order_details = OrderDetail::where('order_id', '=', session('order_id'))->get();
            $total_sales = 0;
            $total_profits = 0;
            $total_quantity = 0;
            foreach ($order_details as $item){
                $buyprice = $item->product->buying_price;
                $sellprice = $item->product->selling_price;
                $profits = $sellprice - $buyprice;
                $quantity = $item->quantity;
                $total_sales += $sellprice * $quantity;
                $total_profits += $profits * $quantity;
                $total_quantity += $quantity;
            }
            
            return view('OrderDetail.index',[
                'products' => Product::orderBy('product_name')->get(),
                'order_details' => OrderDetail::where('order_id', '=', $order_id)->orderBy('id')->get(),
                'order_id' => $order_id,
                'total_sales' => $total_sales,
                'total_profits' => $total_profits,
                'total_quantity' => $total_quantity,
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
        if($product['quantity'] >= $quantity)
        {
            if($check)
            {
                $product->quantity = intval($product['quantity'] - 1);
                $product->save();
                $validatedData['quantity'] = intval($check['quantity']) + 1;
                
                OrderDetail::where('id', $check['id'])->update($validatedData);
            }
            else
            {
                $product->quantity = intval($product['quantity'] - 1);
                $product->save();
                OrderDetail::create($validatedData);
            }
            return redirect('/order-detail')->with('success', 'New product added successfully!');
        }
        else
        {
            return redirect('/order-detail')->with('failed', 'Check Stock!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Domain\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Domain\Models\OrderDetail  $orderDetail
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
     * @param  \App\Core\Domain\Models\OrderDetail  $orderDetail
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

        if(intval($product['quantity']) > 0 && $validatedData['quantity'] > 0)
        {
            $value = intval($orderDetail->quantity) - intval($validatedData['quantity']);
            //dd($value);
            $product->quantity = intval($product['quantity'] + $value);
            $product->save();
            OrderDetail::where('id', $orderDetail->id)->update($validatedData);
            return redirect('/order-detail')->with('success', 'Product added successfully!');
        }
        elseif(intval($product['quantity']) == 0 && (intval($validatedData['quantity']) < intval($orderDetail->quantity)))
        {
            $value = intval($orderDetail->quantity) - intval($validatedData['quantity']);
            //dd($value);
            $product->quantity = intval($product['quantity'] + $value);
            $product->save();
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
        $check = OrderDetail::where('id', '=', $id)->first();
        $product = Product::where('id', '=', $check['product_id'])->first();
        $product->quantity = intval($product['quantity'] + intval($check['quantity']));
        $product->save();
        OrderDetail::destroy($id);

        return redirect('/order-detail')->with('success', 'Product deleted successfully!');
    }
}
