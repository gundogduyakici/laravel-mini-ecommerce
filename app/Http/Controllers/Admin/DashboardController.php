<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Products::all();
        $categoryCount = Categories::all();

        return view('admin.dashboard', compact('productCount', 'categoryCount'));
    }
}
