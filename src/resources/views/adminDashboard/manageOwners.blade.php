@extends('adminDashboard.layouts.master')
@section('title','Manage owners')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
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
                    <div class="purple bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h5 class="text-white text-capitalize ps-3">Owners Form</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" class="text-start" method="POST"
                        action="@if($update === true){{ route('owners.update',$owner->id) }} @else {{ route('owners.store') }} @endif"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="2">
                        <label class="form-label">Company Name</label>
                        <div class=" input-group input-group-outline my-3">
                            <input type="text" name="company_name" class="form-control" placeholder=""
                                value="@if($update==true){{ $owner->company_name }}
                            @endif">
                        </div>

                        <label class="form-label">Company Email</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="email" class="form-control" name="email" placeholder="" value="@if($update==true){{ $owner->email }}
                            @endif">
                        </div>

                        <div class="input-group input-group-outline mb-3 ">
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <label class="form-label">Phone</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="" value="@if($update==true){{ $owner->phone }}
                            @endif">
                        </div>

                        <label class="form-label">Address</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" class="form-control" name="address" placeholder="" value="@if($update==true){{ $owner->address }}
                            @endif">
                        </div>

                        @if ($update === false)
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <button type="submit" class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Add
                                        to Owners</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-end">
                            <div class="col-lg-4 col-sm-12">
                                <div class="text-center">
                                    <form action="{{ route('owners.update',$owner->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Update
                                            Owners info</button>
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
                        <h6 class="text-white text-capitalize ps-3">Owners Information table</h6>
                    </div>
                </div>
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th class=" font-weight-bolder">Company Logo</th>
                                        <th class=" font-weight-bolder"> Company Name</th>
                                        <th class=" font-weight-bolder"> Company Email</th>
                                        <th class=" font-weight-bolder"> Company Phone</th>
                                        <th class=" font-weight-bolder"> Company Address</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ownersInfo as $owner)
                                    <tr>

                                        <td class="ps-4"><img width="50px" height="50px" src="{{ asset($owner->logo) }}"
                                                alt="user image"></td>

                                        <td>{{$owner->company_name}}</td>
                                        <td>{{$owner->email }}</td>
                                        <td> {{$owner->phone }}</td>
                                        <td>{{$owner->address }}</td>
                                        <td class="ps-4 pe-0  text-right">
                                            <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                                href="{{ route('owners.edit',$owner->id) }}"><i
                                                    class="fas fa-edit h6"></i></a>

                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('owners.destroy',$owner->id) }}">
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
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>
</div>
@endsection
