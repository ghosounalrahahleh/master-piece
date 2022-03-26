@extends('adminDashboard.layouts.master')
@section('title','Manage orders')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        @if ($update === true)
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
                        <h5 class="text-white text-capitalize ps-3">Owner Orders Form</h5>

                    </div>
                </div>
                <div class="card-body">
                    <form class="text-start" method="POST" action="@if($update === true){{ route('ordersDetails.update',$order->id) }} @endif
                    ">
                        @csrf
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label"></label>
                            <select class="form-control form-select w-100 p-2" name="status">
                                @if ($update===true)
                                <option class='w-100' value='{{ $order->status}}' selected>
                                    {{ $order->status }}</option>
                                @else
                                <option class='w-100' value=''>Order Status</option>
                                @endif
                                <option class='w-100' value='Delivered'>Delivered</option>
                                <option class='w-100' value='Pending'>Pending</option>
                            </select>
                        </div>
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">

                                    <form action="{{route('ordersDetails.update',$order->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Update
                                            Order Status</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @endif
        {{-- Form End --}}

        {{--Orders Table Start --}}
        <div class="col-12 ">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Orders table</h6>
                    </div>
                </div>

                <!-- Basic Tables start -->
                <section class="section">

                    <div class="card">
                        <div class="card-body">
                            @if ($orders===[])
                            <h2 class="text-center">There is no orders yet!</h2>
                            @else
                            <table class="table" id="table1">
                                <thead>
                                    <th class=" font-weight-bolder"> Order Detail ID</th>
                                    <th class=" font-weight-bolder"> Order ID</th>
                                    <th class=" font-weight-bolder"> Product Name</th>
                                    <th class=" font-weight-bolder"> Product Image</th>
                                    <th class=" font-weight-bolder"> Size</th>
                                    <th class=" font-weight-bolder"> Color</th>
                                    <th class=" font-weight-bolder"> Quantity</th>
                                    <th class=" font-weight-bolder"> Status</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td class="ps-4"> {{ $order->id }} </td>
                                        <td class="ps-4">{{ $order->order_id }} </td>
                                        <td class="ps-4 rounded ">{{ $order->product->name }} </td>
                                        <td class="ps-4 rounded "><img width="100px"
                                                src="{{ asset( $order->product->main_image) }}"
                                                alt="{{ $order->product->name }} "></td>
                                        <td class="ps-4 rounded ">{{ $order->size }} </td>
                                        <td class="ps-4 rounded ">{{ $order->color }} </td>
                                        <td class="ps-4 rounded ">{{ $order->quantity}} </td>
                                        @if ($order->status === 'Pending')
                                        <td class="ps-4 rounded text-warning">{{ $order->status }} <i
                                                class="fas fa-spinner h6 text-warning ps-2"></i> </td>
                                        @else
                                        <td class="ps-4 rounded text-success">{{ $order->status }} <i
                                                class="fas fa-check h6 text-success ps-2"></i></td>
                                        @endif
                                        <td class="ps-4 pe-0  text-right">
                                            <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                                href="{{ route('orders.edit',$order->id) }}">
                                                <i class="fas fa-edit h6"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif

                        </div>
                    </div>

                </section>
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>
</div>

@endsection
