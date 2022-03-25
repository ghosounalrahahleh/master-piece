<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $update     = false;
        return view('adminDashboard.manageCategories', compact('categories', 'update'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $this->validate($request, [
            'name'  => 'required|unique:categories',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
        }

        Category::create([
            "name" => $request->name,
            "image" => 'images/' . $new_file
        ]);
        session()->flash('message', "The Category has been added successfully");
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    public function CategoryShow($id)
    {
        $url = "Category/$id";
        $categories = Category::all();
        $products   = Product::where('category_id', $id)->paginate(12);
        return view('publicSite.singleCategory', compact('categories', 'products', 'url'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update     = true;
        $categories = Category::all();
        $category   = Category::find($id);
        return view('adminDashboard.manageCategories', compact('categories', 'category', 'update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
            $category->image = 'images/' . $new_file;
        }
        $category->name = $request->name;
        session()->flash('message', "The category has been updated successfully");
        $category->update();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', "The category has been deleted successfully");
        return redirect()->route('categories.index');
    }

    // public site
    public function categories()
    {
        $categories = Category::all();
        $products   = Product::paginate(12);
        return view('publicSite.categories', compact('categories', 'products'));
    }
}
