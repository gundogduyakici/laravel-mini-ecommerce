<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\Categories;
use Illuminate\Support\Str;
use Image;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $products = Products::with(['images', 'categories'])->get();
        
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        try {
            $validated = $request->validate([
                'product_name' => 'required',
                'tr_price' => 'required',
                'link' => 'required|max:200',
                'categories_id' => 'required',
                'cover_image' => 'required'
            ]);

            $product = new Products();
            $product->slug = str_slug($request->input('product_name'), '-');
            $product->product_name = $request->input('product_name');
            $product->product_code = $request->input('product_code');
            $product->tr_price = $request->input('tr_price');
            $product->usd_price = $request->input('usd_price');
            $product->euro_price = $request->input('euro_price');
            $product->description = $request->input('description');
            $product->featured = $request->input('featured') === "0" ? true : false;
            $product->link = $request->input('link');
            $product->categories_id = $request->input('categories_id');

            $product->save();

            if($request->hasFile('cover_image')) {
                $productImages = new ProductImage();
                $productImages->products_id = $product->id;
                $productImages->cover = true;

                $coverImage = $request->file('cover_image');
                $imageNameCover = $coverImage->getClientOriginalName();
                $fileNameCover =  'public/images/' . time() . '-' . $imageNameCover;
                Image::make($coverImage)->resize(610, 490)->save(storage_path('app/' . $fileNameCover));
                $productImages->file = $fileNameCover;

                $productImages->save();
            }

            if($request->hasFile('images')) {
                foreach($request->file('images') as $file) {
                    $productImages = new ProductImage();
                    $productImages->products_id = $product->id;
                    $productImages->cover = false;
                    
                    $imageName = $file->getClientOriginalName();
                    $fileName =  'public/images/' . time() . '-' . $imageName;
                    Image::make($file)->resize(610, 490)->save(storage_path('app/' . $fileName));
                    $productImages->file = $fileName;

                    $productImages->save();
                }
            }

            return redirect()->back()->with(['message' => 'Product Registered Successfully.', 'status' => 'success']);

        } catch(\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with(['message' => $ex->errorInfo[2], 'status' => 'danger']);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        
        return view('admin.product.edit', compact('product', 'categories'));
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
        try {
            $validateData = $request->validate([
                'product_name' => 'required',
                'link' => 'required|max:200',
                'categories_id' => 'required',
                'tr_price' => 'required|numeric',
                'usd_price' => 'numeric',
                'euro_price' => 'numeric'
            ]);

            $product = Products::find($id);

            $product->product_name = $request->input('product_name');
            $product->product_code = $request->input('product_code');
            $product->link = $request->input('link');
            $product->tr_price = $request->input('tr_price');
            $product->usd_price = $request->input('usd_price');
            $product->euro_price = $request->input('euro_price');
            $product->featured = $request->input('featured') === "0" ? true : false;
            $product->categories_id = $request->input('categories_id');

            if($product) {
                $product->save();
                return redirect()->back()->with(['message' => 'Product Updated Successfully.', 'status' => 'success']);
            }

            return redirect()->back()->with(['message' => 'An unexpected error has occurred. Please try again.', 'status' => 'danger']);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with(['message' => $ex->errorInfo[2], 'status' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        try {
            $delete = Products::destroy($id);

            if($delete) {
                $productImages = ProductImage::where('products_id', $id)->get();                

                if($productImages) {
                    foreach($productImages as $image) {
                        \Storage::disk('public')->delete($image->file);
                    }

                    return response()->json(["message" => "I hope you don't regret it, the product has been deleted successfully."]);
                }

                return response()->json(['message' => 'An unexpected error has occurred, please try again.']);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['message' => $ex->errorInfo[2]]);
        }
    }
}
