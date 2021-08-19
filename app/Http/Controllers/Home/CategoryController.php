<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use DB;

class CategoryController extends Controller
{
    public function category($slug, $id)
    {        
        $category = Categories::where([
            'id' => $id,
            'slug' => $slug
        ])->first();        

        if(!$category) {
            return redirect('/404');
        }        

        $products = Products::with(['categories', 'coverImage'])->where('categories_id', $id)->paginate(12);
        $categories = Categories::with('products')->get();        

        return view('home.category.index', compact('products', 'category', 'categories'));
    }
}
