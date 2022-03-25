@extends('publicSite.layouts.master')
@section('title','Join Us')
@section('content')
<div class="container my-5 w-lg-50 w-md-50 w-sm-100" id="joinUs__container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-10 rounded ">
            <div class="card py-5">
                <div class="text-center h1 form-title mb-2">Join Us</div>
                <div class="card-body">
                    {{-- Operation Message --}}
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show text-white bg-success mb-5 "
                        role="alert">
                        <strong> {{ session('message') }}</strong>
                        <button type="button" class="btn-close text-white me-3" data-bs-dismiss="alert"
                            aria-label="Close"></button>
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
                        <button type="button" class="btn-close text-white me-3" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('JoinStore') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="role_id">
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="name" class=" col-form-label text-purple ">Company Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                    required>
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="email" class=" col-form-label text-purple ">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="number"
                                    class=" col-form-label text-purple @error('phone') is-invalid @enderror">Phone
                                    Number</label>
                                <input id="number" type="number" class="form-control" name="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="address" class=" col-form-label text-purple ">Address</label>
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <label for="logo" class=" col-form-label text-purple ">Company Logo</label>
                                <input type="file" name="logo" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-0 ">
                            <div class="col-md-10 m-auto offset-md-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-purple w-25 mt-3">Send</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
