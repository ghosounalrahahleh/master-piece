<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update   = false;
        $orders   = [];

        if (auth()->user()->role_id === 2) {
            $ordersDetails = OrderDetail::all();
            foreach ($ordersDetails as $order) {
                if ($order->product->owner_id == auth()->user()->id) {
                    array_push($orders, $order);
                }
            }
            return view('adminDashboard.manageOwnerOrders', compact('orders', 'update'));
        } else {

            $orders = Order::orderBy('id', 'desc')->paginate(15);
            return view('adminDashboard.manageOrders', compact('orders', 'update'));
        }


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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders    = [];
        $update    = true;
        if (auth()->user()->role_id === 2) {
            $ordersDetails = OrderDetail::all();
            foreach ($ordersDetails as $order) {
                if ($order->product->owner_id == auth()->user()->id) {
                    array_push($orders, $order);
                }
            }
            $order = OrderDetail::find($id);
            return view('adminDashboard.manageOwnerOrders', compact('orders', 'update', 'order'));
        } else {
            $orders  = Order::orderBy('id', 'desc')->paginate(15);
            $order   = Order::find($id);
            return view('adminDashboard.manageOrders', compact('order', 'update', 'orders'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $data = $this->validate($request, [
            "status" => 'required'
        ]);

        $order       = Order::find($id);
        $order->status = $request->status;
        $order->update();
        session()->flash('message', "The order status has been updated successfully");
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
