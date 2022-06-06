<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Category $category, Product $product)
    {
        return view('welcome', [
            'category_count' => $category->count(),
            'product_count' => $product->count(),
            'today_orders' => Order::whereDate('created_at', Carbon::today())->get(),
            'orders' => Order::latest()->limit(10)->get(),
            'warning_products' => Product::where('quantity', '<', 5)->get(),
        ]);
    }
}
