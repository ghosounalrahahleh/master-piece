@extends('adminDashboard.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        {{-- Order Details Table Start --}}




        <div class="col-12 ">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white ps-3 ">Order id : {{$id}}</h6>
                    </div>
                </div>
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder"> Product image</th>
                                        <th class="font-weight-bolder"> Product Name</th>
                                        <th class="font-weight-bolder"> Product Price</th>
                                        <th class="font-weight-bolder"> Size </th>
                                        <th class="font-weight-bolder"> Color </th>
                                        <th class="font-weight-bolder"> Quantity </th>
                                        <th class="font-weight-bolder"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails as $orderDetail)
                                    <tr>
                                        <td class="ps-4"><img width="100px" height="100px"
                                                src="{{ asset($orderDetail->product->main_image) }}"
                                                alt="product image">
                                        </td>
                                        <td class="ps-4">{{ $orderDetail->product->name }} </td>
                                        <td class="ps-4">{{ $orderDetail->product->price }} </td>
                                        <td class="ps-4"> {{ $orderDetail->size}}</td>
                                        <td class="ps-4"> {{ $orderDetail->color}}</td>
                                        <td class="ps-4"> {{ $orderDetail->quantity}}</td>
                                        @if ($orderDetail->status === 'Pending')
                                        <td class="ps-4 rounded text-warning">{{ $orderDetail->status }} <i
                                                class="fas fa-spinner h6 text-warning ps-2"></i> </td>
                                        @else
                                        <td class="ps-4 rounded text-success">{{ $orderDetail->status }} <i
                                                class="fas fa-check h6 text-success ps-2"></i></td>
                                        @endif
                                        <td class="ps-4 h-100">
                                            <input type="checkbox" name="done" id="">
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
        {{-- Order details table end --}}
    </div>
</div>
@endsection
