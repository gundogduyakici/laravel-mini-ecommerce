<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
                'category_name' => 'required',
            ]);

            $category = new Categories();
            $category->slug = str_slug($request->input('category_name'), '-');
            $category->name = $request->input('category_name');

            if($request->hasFile('image')) {
                $category->file = \Storage::putFile('images', $request->file('image'));
            }

            $category->save();

            return redirect()->back()->with(['message' => 'Category Registered Successfully.', 'status' => 'success']);

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
        $category = Categories::find($id);        
        
        return view('admin.category.edit', compact('category'));
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
                'category_name' => 'required',
            ]);

            $category = Categories::find($id);

            $category->slug = str_slug($request->input('category_name'), '-');
            $category->name = $request->input('category_name');

            if($request->hasFile('image')) {                                
                \Storage::disk('public')->delete($category->file);
                $category->file = \Storage::putFile('images', $request->file('image'));
            }

            if($category) {
                $category->save();
                return redirect()->back()->with(['message' => 'Category Updated Successfully', 'status' => 'success']);
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
            $category = Categories::find($id);

            if($category) {                
                \Storage::disk('public')->delete($category->file);
                Categories::destroy($id);

                return response()->json(["message" => "I hope you don't regret it, the category has been deleted successfully."]);                                
            }else {
                return response()->json(['message' => 'An unexpected error has occurred. Please try again.']);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['message' => $ex->errorInfo[2]]);
        }
    }
}
