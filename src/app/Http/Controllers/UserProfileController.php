<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = false;
        return view('publicSite.profile', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'country' => 'required',
            'city'    => 'required',
            'street'  => 'required',
        ]);

        Address::create(
            [
                "country" => $request->country,
                "city"    => $request->city,
                "street"  => $request->street,
                "user_id" => auth()->user()->id,
            ]
        );

        return redirect()->route('UserAddress');
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
    public function show()
    {
        $show = true;
        return view('publicSite.profile', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('publicSite.profile');
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
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required| email ',
        ]);
        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = $request->password != null ? Hash::make($request->password) :  $user->password;
        $user->role_id  = auth()->user()->role_id;
        $user->update();
        session()->flash('message', "The user has been updated successfully");
        return redirect()->route('userProfile.index');
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

    public function GetUserOrders()
    {
        $show   = false;
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view("publicSite.profile", compact('orders', 'show'));
    }
    public function GetUserAddress()
    {
        $show    = false;
        $address = Address::where('user_id', auth()->user()->id)->get();
        return view("publicSite.profile", compact('address', 'show'));
    }

    public function editAddress($id)
    {
        $show    = false;
        $edit    = true;
        $address = Address::where('user_id', auth()->user()->id)->get();
        return view("publicSite.profile", compact('address', 'show', 'edit'));
    }

    public function updateAddress(Request $request, $id)
    {
        $this->validate($request, [
            'country' => 'required',
            'city'    => 'required',
            'street'  => 'required',
        ]);
        $address = Address::find($id);
        $address->country = $request->country;
        $address->city    = $request->city;
        $address->street  = $request->street;
        $address->update();
        session()->flash('message', "Your address updated successfully!");
        return redirect()->route('UserAddress');
    }

    public function viewDetails($id)
    {
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $show         = false;
        return view('publicSite.profile', compact('show', 'orderDetails'));
    }
}
