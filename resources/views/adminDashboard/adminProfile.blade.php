@extends('adminDashboard.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        {{-- Form Start --}}@if($update === true)
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
                    <li> <strong> {{ $error }}</strong></li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close text-white me-3" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fas fa-times "></i>
                </button>
            </div>
            @endif

            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple shadow-primary border-radius-lg py-3 pe-1">
                        <h5 class="text-white text-capitalize ps-3">User Info Form</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" class="text-start" method="POST" action="{{ route('profiles.update',$user->id)  }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role_id" value="{{ auth()->user()->role_id }}">

                        <label class="form-label">User Name</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="name" class="form-control" placeholder=""
                                value="{{ $user->name }}">
                        </div>

                        <label class="form-label">Email</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="email" name="email" class="form-control" placeholder=""
                                value="{{ $user->email }}">
                        </div>
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password" class="form-control" placeholder=""
                                value="{{ $user->password }}">
                        </div>
                        <label class="form-label">User Image</label>
                        <div class="input-group input-group-outline mb-3 ">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <form action="{{ route('profiles.update',$user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        {{-- Form End --}} @endif
        <div class="card card-body mx-3 mx-md-4 ">
            <div class="container">
                <div class="main-body">

                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">

                                        <img src="{{asset($user->image) }}" alt="{{$user->name }}"
                                            class="rounded-circle" width="150">
                                        <div class="mt-4">


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                                href="{{ route('profiles.edit', $user->id) }}">
                                                <i class="fas fa-edit h6"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">Full Name</h6></div>
                                        <div class="col-sm-9 text-secondary"> {{ $user->name }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">Email</h6></div>
                                        <div class="col-sm-9 text-secondary"> {{ $user->email }}</div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
