<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Products::with(['coverImage' => function($q) {
            // Query the name field in status table
            $q->where('cover', '=', true); // '=' is optional
        }])->where('featured', true)->orderBy('id', 'desc')->take(12)->get();

        return view('home', compact('featuredProducts'));
    }

    public function notFound()
    {
        return view('404');
    }
}
