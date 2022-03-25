<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\OwnerInfo;
use App\Http\Requests\StoreOwnerInfoRequest;
use App\Http\Requests\UpdateOwnerInfoRequest;
use Illuminate\Support\Facades\Hash;

class OwnerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update     = false;
        $ownersInfo = OwnerInfo::paginate(5);
        return view('adminDashboard.manageOwners', compact('ownersInfo', 'update'));
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
     * @param  \App\Http\Requests\StoreOwnerInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnerInfoRequest $request)
    {
        $this->validate($request, [
            'company_name' => 'required| max:250',
            'email'        => 'required| email |unique:owner_infos',
            'logo'         => 'required',
            'phone'        => 'required',
            'address'      => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
        }

        OwnerInfo::create(
            [
                "company_name" => $request->company_name,
                "email"   => $request->email,
                "phone"   => $request->phone,
                "address" => $request->address,
                "logo"    => 'images/' . $new_file,
                "user_id" => $request->user_id,
            ]
        );
        session()->flash('message', "The Owner has been added successfully");
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OwnerInfo  $ownerInfo
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerInfo $ownerInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OwnerInfo  $ownerInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update     = true;
        $ownersInfo = OwnerInfo::paginate(5);
        $owner = OwnerInfo::find($id);
        return view('adminDashboard.manageOwners', compact('ownersInfo', 'update', 'owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerInfoRequest  $request
     * @param  \App\Models\OwnerInfo  $ownerInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerInfoRequest $request, $id)
    {
        $owner = OwnerInfo::find($id);
        $this->validate($request, [
            'company_name' => 'required|max:250',
            'email'        => 'required|email|unique:owner_infos',
            'phone'        => 'required',
            'address'      => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
            $owner->logo         = 'images/' . $new_file;
        };

        $owner->company_name = $request->company_name;
        $owner->email        = $request->email;
        $owner->phone        = $request->phone;
        $owner->address      = $request->address;
        $owner->user_id      = $request->user_id;
        $owner->update();
        session()->flash('message', "The Owner has been updated successfully");
        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OwnerInfo  $ownerInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = OwnerInfo::find($id);
        $owner->delete();
        session()->flash('message', "The owner has been deleted successfully");
        return redirect()->route('owners.index');
    }
    public function JoinUs()
    {
       if(Auth::check()){
          return view('publicSite.joinUs');
       }else{
          return redirect()->route("login");
       }
    }


   public function joinStore(StoreOwnerInfoRequest $request)
   {
       //dd($request->logo);
       $this->validate($request, [
           'company_name' => 'required| max:250',
            'email'        => 'required| email ',
            'logo'         => 'required',
            'phone'        => 'required',
            'address'      => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
        }

        OwnerInfo::create(
            [
                "company_name" => $request->company_name,
                "email"   => $request->email,
                "phone"   => $request->phone,
                "address" => $request->address,
                "logo"    => 'images/' . $new_file,
                "user_id" => $request->user_id,
                ]
            );

            //dd($request);
        session()->flash('message', "We received your request successfully!
                           we will contact soon.");
        return view('publicSite.joinUs');

   }
}
