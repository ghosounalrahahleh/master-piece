<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles  = Role::all();
        $update = false;
        return view('adminDashboard.manageRoles', compact('roles', 'update'));
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
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $this->validate($request, [
            "role" => 'required|unique:roles'
        ]);

        Role::create($request->all());
        session()->flash('message', "The role has been added successfully");
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role   = Role::find($id);
        $roles  = Role::all();
        $update = true;
        return view('adminDashboard.manageRoles', compact('role', 'update', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $data = $this->validate($request, [
            "role" => 'required |unique:roles'
        ]);

        $role       = Role::find($id);
        $role->role = $request->role;
        $role->update();
        session()->flash('message', "The role has been updated successfully");
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete code
        $role = Role::find($id);
        $role->delete();
        session()->flash('message', "The role has been deleted successfully");
        return redirect()->route('roles.index');
    }
}
