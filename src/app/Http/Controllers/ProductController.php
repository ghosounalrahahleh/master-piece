<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Auth;
use App\Models\Comment;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id === 2) {
            $products   = Product::where('owner_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        } else {
            $products   = Product::orderBy('id', 'desc')->paginate(15);
        }
        //dd($products);
        $categories = Category::all();
        $update     = false;
        return view('adminDashboard.manageProducts', compact('products', 'categories', 'update'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->validate($request, [
            "name"        => "required|max:250",
            "description" => "required",
            "is_new"      => "required",
            "is_onSale"   => "required",
            "price"       => "required|integer",
            "sale_price"  => "integer",
            "tag"         => "required",
            "color"       => "required",
            "size"        => "required",
            "quantity"    => "required",
            "owner_id"    => "required",
            "category_id" => "required",
            "main_image"  => "required",
        ]);
        $data = $request->all();
        // main image
        if ($request->hasFile('main_image')) {
            $file = $request->main_image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
        }
        $data['main_image'] = 'images/' . $new_file;
        // second image
        if ($request->hasFile('second_image')) {
            $file2 = $request->second_image;
            $new_file = time() . $file2->getClientOriginalName();
            $file2->move('images/', $new_file);
        }
        $data['second_image'] = 'images/' . $new_file;
        // third image
        if ($request->hasFile('third_image')) {
            $file3 = $request->third_image;
            $new_file = time() . $file3->getClientOriginalName();
            $file3->move('images/', $new_file);
        }
        $data['third_image'] = 'images/' . $new_file;

        Product::create($data);
        session()->flash('message', "The product has been added successfully");
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }
    public function productShow($id)
    {
        $product         = Product::find($id);
        $comments        = Comment::where('product_id', $id)->paginate(5);
        $count           = Comment::where('product_id', $id)
                            ->where('status', 'Delivered')
                            ->count();
                           
        $relatedProducts = Product::where('category_id',$product->category_id)->take(10)->get();
        return view('publicSite.singleProduct', compact('product', 'comments', 'count', 'relatedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role_id === 2) {
            $products   = Product::where('owner_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        } else {
            $products   = Product::orderBy('id', 'desc')->paginate(15);
        }
        $product    = Product::find($id);
        $categories = Category::all();
        $update     = true;
        return view('adminDashboard.manageProducts', compact('products', 'product', 'categories', 'update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->validate($request, [
            "name"        => "required|max:250",
            "description" => "required",
            "is_new"      => "required",
            "is_onSale"   => "required",
            "price"       => "required|integer",
            "sale_price"  => "integer",
            "tag"         => "required",
            "color"       => "required",
            "size"        => "required",
            "quantity"    => "required",
            "owner_id"    => "required",
            "category_id" => "required",

        ]);
        $data = Product::find($id);
        // main image
        $data->name        = $request->name;
        $data->description = $request->description;
        $data->is_new      = $request->is_new;
        $data->is_onSale   = $request->is_onSale;
        $data->price       = $request->price;
        $data->sale_price  = $request->sale_price;
        $data->tag         = $request->tag;
        $data->color       = $request->color;
        $data->size        = $request->size;
        $data->quantity    = $request->quantity;
        $data->owner_id    = $request->owner_id;
        $data->category_id = $request->category_id;

        if ($request->hasFile('main_image')) {
            $file = $request->main_image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
            $data['main_image'] = 'images/' . $new_file;
        }

        // second image
        if ($request->hasFile('second_image')) {
            $file2 = $request->second_image;
            $new_file = time() . $file2->getClientOriginalName();
            $file2->move('images/', $new_file);
            $data['second_image'] = 'images/' . $new_file;
        }

        // third image
        if ($request->hasFile('third_image')) {
            $file3 = $request->third_image;
            $new_file = time() . $file3->getClientOriginalName();
            $file3->move('images/', $new_file);
            $data['third_image'] = 'images/' . $new_file;
        }

        $data->update();
        session()->flash('message', "The product has been added successfully");
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', "The category has been deleted successfully");
        return redirect()->route('products.index');
    }
}
