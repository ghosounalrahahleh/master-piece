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
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase font-weight-bolder"> Product image</th>
                                    <th class="text-uppercase font-weight-bolder"> Product Name</th>
                                    <th class="text-uppercase font-weight-bolder"> Product Price</th>
                                    <th class="text-uppercase font-weight-bolder"> Size </th>
                                    <th class="text-uppercase font-weight-bolder"> Color </th>
                                    <th class="text-uppercase font-weight-bolder"> Quantity </th>
                                    <th class="text-uppercase font-weight-bolder"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $orderDetail)
                                <tr>
                                    <td class="ps-4"><img width="100px" height="100px"
                                            src="{{ asset($orderDetail->product->main_image) }}" alt="product image">
                                    </td>
                                    <td class="ps-4">{{ $orderDetail->product->name }} </td>
                                    <td class="ps-4">{{ $orderDetail->product->price }} </td>
                                    <td class="ps-4"> {{ $orderDetail->size}}</td>
                                    <td class="ps-4"> {{ $orderDetail->color}}</td>
                                    <td class="ps-4"> {{ $orderDetail->quantity}}</td>
                                    <td class="ps-4 h-100">
                                        <input type="checkbox" name="done" id="">
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- pagination part --}}
                    <div class="d-flex justify-content-center mt-3">
                        {!! $orderDetails->links() !!}
                    </div>
                    {{-- end pagination part --}}
                </div>
            </div>
        </div>

        {{-- Order details table end --}}
    </div>
</div>
@endsection
