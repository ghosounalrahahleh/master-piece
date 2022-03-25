<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(session()->get('cart',[]));
        return view("publicSite.cart");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->quantity ?? 1;
        } else {

            $cart[$request->id] = [
                "name" => $request->name,
                "quantity" => $request->quantity ?? 1,
                "size" => $request->size ?? "s",
                "price" => (int)$request->price,
                "image" => $request->image
            ];
        }
        session()->put('cart', $cart);
        //dd(session()->get('cart', []));
        return redirect()->back()->with('success', 'Product added to cart successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = (int)$request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Product removed successfully');
        if (session()->get('cart', []) == []) {
            return view("publicSite.empty");
        } else {
            return  redirect()->route('cart.index');
        }
    }

    public function viewCheckOut()
    {
        $address = Address::where('user_id', auth()->user()->id)->get();
        return view('publicSite.checkOut', compact('address'));
    }

    public function CheckOut(Request $request)
    {
        $this->validate($request, [
            "country" => 'required',
            "city"    => 'required',
            "street"  => 'required'
        ]);

        //check if the address existing from before
        $address = Address::where('id', auth()->user()->id)->get();

        if (count($address) != 0) {
            Address::create(
                [
                    "country" => $request->country,
                    "city"    => $request->city,
                    "street"  => $request->street,
                    "user_id" => auth()->user()->id,
                ]
            );
        }
        $cart = session()->get('cart', []);

        //add new order
        $total = 0;
        foreach
        ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }
        Order::create(
            [
            "status"      => "pending",
            "total_price" => $total + 4,
            "user_id"     => auth()->user()->id
            ]);


        // save the order details
        $orderId = Order::where('user_id', auth()->user()->id )->orderBy('id', 'desc')->first();

        foreach ($cart as $id => $details) {
            OrderDetail::create(
                [
                    "order_id"   => $orderId->id,
                    "product_id" => $id,
                    "quantity"   => $details['quantity'],
                    "size"       => $details['size'],
                    "color"      => "red",
                    "price"      => $details['price'],
                    "status"     => "Pending"
                ]
            );
        }
        $request->session()->forget('cart');
        return view("publicSite.order",compact('orderId'));
    }
}
