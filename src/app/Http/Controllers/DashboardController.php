<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Category $category, Product $product)
    {
        return view('welcome', [
            'category_count' => $category->count(),
            'product_count' => $product->count(),
        ]);
    }
}
