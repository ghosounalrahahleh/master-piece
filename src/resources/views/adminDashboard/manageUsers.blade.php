@extends('adminDashboard.layouts.master')
@section('title','Manage users')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">

        {{-- Form Start --}}
        <div class="col-lg-12 col-md-8 col-12 mx-auto my-5">
            {{-- Operation Message --}}
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show text-white bg-success mb-5 " role="alert">
                <strong> {{ session('message') }}</strong>
                <button type="button" class="btn-close text-white me-3" data-bs-dismiss="alert" aria-label="Close"><i
                        class="fas fa-times "></i></button>
            </div>
            @endif
            {{-- Errors Message --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show text-white mb-5 " role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        <strong> {{ $error }}</strong>
                    </li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close text-white me-3" data-bs-dismiss="alert" aria-label="Close"><i
                        class="fas fa-times "></i></button>
            </div>
            @endif

            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple shadow-primary border-radius-lg py-3 pe-1">
                        <h5 class="text-white text-capitalize ps-3">User Info Form</h5>
                    </div>
                </div>
                <div class="card-body">

                    <form role="form" class="text-start" method="POST"
                        action="@if($update === true){{ route('users.update',$user->id) }} @else {{ route('users.store') }} @endif"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="form-label">User Name</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="name" class="form-control" placeholder=""
                                value="@if($update==true){{ $user->name }}@endif">
                        </div>

                        <label class="form-label">Email</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="email" name="email" class="form-control" placeholder=""
                                value="@if($update==true){{ $user->email }}@endif">
                        </div>

                        <label class="form-label">Password</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password" class="form-control" placeholder=""
                                value="@if($update==true){{ $user->password }}@endif">
                        </div>
                        <label class="form-label">User Role</label>
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control w-100 mb-4  p-2" name='role_id' value="">
                                @if ($update===true)
                                <option class='w-100' value="@if($update==true){{ $user->role_id }}@endif" selected>{{
                                    $user->role->role }}</option>
                                @else
                                <option class='w-100' value=''>Select User Role </option>
                                @endif
                                @foreach ($roles as $role)
                                <option class='w-100' value='{{ $role->id}}'>{{ $role->role}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($update === false)
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <button type="submit" class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Add
                                        to
                                        Users</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <form action="{{ route('users.update',$user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Update
                                            User Info</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
        {{-- Form End --}}
        {{-- Table Start --}}
        <div class="col-12 ">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Users table</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th class=" font-weight-bolder"> #</th>
                                    <th class=" font-weight-bolder"> User Name</th>
                                    <th class=" font-weight-bolder"> User Email</th>
                                    <th class=" font-weight-bolder"> User Role</th>
                                    <th class=" font-weight-bolder"> User photo</th>
                                    <th class=" font-weight-bolder"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="ps-4">{{ $user->id }} </td>
                                    <td class="ps-4">{{ $user->name }} </td>
                                    <td class="ps-4"> {{ $user->email }}</td>
                                    <td class="ps-4"> {{ $user->role->role }}</td>
                                    <td class="ps-4"><img width="50px" height="50px" src="{{ asset($user->image) }}"
                                            alt="user image"></td>
                                    <td class="ps-4 pe-0 d-flex text-right ">
                                        {{-- display User Detailes --}}
                                        <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                            href="{{ route('users.show',$user->id) }}">
                                            <i class="fas fa-eye h6"></i>
                                        </a>
                                        {{-- edit user detaile --}}
                                        <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                            href="{{ route('users.edit',$user->id) }}">
                                            <i class="fas fa-edit h6"></i>
                                        </a>
                                        {{-- delete user --}}
                                        <form method="POST" action="{{ route('users.destroy',$user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link text-dark px-3 mb-0" type="submit">
                                                <i class="fas fa-trash h6"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
