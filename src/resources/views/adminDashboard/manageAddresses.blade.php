@extends('adminDashboard.layouts.master')
@section('title','Manage addresses')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        {{-- Table Start --}}
        <div class="col-12 ">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Addresses table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0 ">
                            <thead>
                                <th class="font-weight-bolder">User ID</th>
                                <th class="font-weight-bolder"> User Name</th>
                                <th class="font-weight-bolder">  Country</th>
                                <th class="font-weight-bolder">  City</th>
                                <th class="font-weight-bolder">  Street</th>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $address)
                                <tr>
                                    <td class="ps-4"> {{ $address->user->id }} </td>
                                    <td class="ps-4">{{ $address->user->name }} </td>
                                    <td class="ps-4 ">{{ $address->country }}</td>
                                    <td class="ps-4 ">{{ $address->city }}</td>
                                    <td class="ps-4 ">{{ $address->street }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- pagination part --}}
                    <div class="d-flex justify-content-center mt-3">
                        {!! $addresses->links() !!}
                    </div>
                    {{-- end pagination part --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
