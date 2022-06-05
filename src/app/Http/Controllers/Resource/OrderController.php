<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Order.index', [
            'orders' => Order::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_sales = '0';
        $order->total_quantity = '0';
        $order->total_profits = '0';
        $order->save();

        session(['order_id' => $order->id]);
        return redirect('/order-detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\OrderDetail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        session(['order_id' => $order->id]);
        return redirect('/order-detail');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'total_sales'  => 'required',
            'total_profits'  => 'required',
            'total_quantity'  => 'required'
        ]);
        Order::where('id', $id)->update($validatedData);

        return redirect('/order')->with('success', 'Order saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        OrderDetail::where('order_id', '=', $id)->delete();

        return redirect('/order')->with('success', 'Order Deleted successfully!');
    }
}
