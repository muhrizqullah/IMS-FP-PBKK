<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(Category $category)
    {
        return view('welcome', [
            'category_count' => $category->count(),
        ]);
    }
}
