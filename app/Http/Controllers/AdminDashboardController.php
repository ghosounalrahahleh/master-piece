<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users        = User::count();
        $orderDetails = 0;
        $sales        = 0;
        if(auth()->user()->role_id === 2){
            $products = Product::where('owner_id',auth()->user()->id)->count();
        }else{
            $products = Product::count();
        }

        if(auth()->user()->role_id === 2){
            $orders = OrderDetail::all();
            foreach ( $orders as $order) {
                if ($order->product->owner_id == auth()->user()->id) {
                    $orderDetails++;
                    $sales += ($order->quantity * $order->price);
                }
            }
        }else{
            $orderDetails = OrderDetail::count();
            $sales= Order::all()->sum('total_price');
        }


        return view('adminDashboard.dashboard', compact('users', 'products', 'orderDetails', 'sales'));


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
