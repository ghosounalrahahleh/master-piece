<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $update = false;
        $users  = User::orderBy('id', 'desc')->get();
        $roles  = Role::all();
        return view('adminDashboard.manageUsers', compact('update', 'users', 'roles'));
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
        $this->validate($request, [
            'name'      => 'required| max:250',
            'email'     => 'required| email |unique:users',
            'password'  => 'required| min:6 | max:30',
            'role_id'   => 'required',

        ]);
        //dd($request->name);
        User::create([
            "name"     => $request->name,
            "role_id"  => $request->role_id,
            "email"    => $request->email,
            "password" => Hash::make($request->password),

        ]);
        session()->flash('message', "The User has been added successfully");
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user     = User::find($id);
       $address  = Address::where('user_id',$id)->get();
       $comments = Comment::where('user_id',$id)->paginate(5);
       $orders   = Order::where('user_id',$id)->get();
       return view('adminDashboard.userDetail',compact('user', 'address', 'comments', 'orders' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user   = User::find($id);
        $users  = User::orderBy('id', 'desc')->paginate(15);
        $roles  = Role::all();
        $update = true;
        return view('adminDashboard.manageUsers', compact('user', 'users', 'update', 'roles'));
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
            'email'     => 'required|email',
            'password'  => 'required',
            'role_id'   => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->update();
        session()->flash('message', "The user has been updated successfully");
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
        session()->flash('message', "The user has been deleted successfully");
        return redirect()->route('users.index');
    }
}
