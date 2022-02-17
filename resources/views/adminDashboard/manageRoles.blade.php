@extends('adminDashboard.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">

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
            {{-- Form Start --}}
            <div class="card z-index-0 fadeIn3 fadeInBottom">

                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple bg-gradient-primary  shadow-primary border-radius-lg py-3 pe-1">
                        <h5 class="text-white text-capitalize ps-3">Roles Form</h5>

                    </div>
                </div>
                <div class="card-body">
                    <form class="text-start" method="POST" action="@if($update === true){{ route('roles.update',$role->id) }} @else {{ route('roles.store') }} @endif
                    ">
                        @csrf

                        <label for="role" class="form-label">Role Name</label>
                        <div class="input-group input-group-outline mb-3 ">

                            <input type="text" id="role" name="role" class="form-control" value="@if($update==true){{ $role->role }}
                                @endif" placeholder="">
                        </div>
                        @if ($update === false)
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <button type="submit" class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Add
                                        to
                                        roles</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <form action="{{ route('roles.update',$role->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="add-role"
                                            class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Update
                                            Role</button>
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
                    <div class="purple bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Roles table</h6>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <th class="text-uppercase font-weight-bolder">
                                        #</th>
                                    <th class="text-uppercase font-weight-bolder">
                                        Role Name</th>
                                    <th></th>

                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td class="ps-4">
                                            {{ $role->id }}
                                        </td>
                                        <td class="ps-4">
                                            {{ $role->role }}
                                        </td>
                                        <td class=" ps-4 pe-0  text-right d-flex">
                                            <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                                href="{{ route('roles.edit',$role->id) }}"><i
                                                    class="fas fa-edit h6"></i></a>

                                            <form method="POST" action="{{ route('roles.destroy',$role->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link text-dark px-3 mb-0" type="submit"><i
                                                        class="fas fa-trash h6"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>


            </div>
        </div>
    </div>
</div>
@endsection
