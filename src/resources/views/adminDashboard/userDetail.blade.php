@extends('adminDashboard.layouts.master')
@section('title','Manage user deyails')
@section('content')
<div class="container-fluid pb-4">
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            @if (count($comments) == 0)
            <h3 class="text-center p-3 "> <span class="text-capitalize">{{ $user->name }}</span> does not have any
                comment yet!</h3>
            @else
            <div class="card-body table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <th class=" font-weight-bolder">#</th>
                        <th class=" font-weight-bolder"> user Name</th>
                        <th class=" font-weight-bolder"> Product Name</th>
                        <th class=" font-weight-bolder"> Product Image</th>
                        <th class=" font-weight-bolder"> Comment Content</th>
                        <th class=" font-weight-bolder"> Comment Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                        <tr>
                            <td class="ps-4"> {{ $comment->id }} </td>
                            <td class="ps-4">{{ $comment->user->name }} </td>
                            <td class="ps-4 ">{{ $comment->product->name }}</td>
                            <td class="ps-4"><img width="50px" height="50px"
                                    src="{{ asset($comment->product->main_image) }}"
                                    alt="{{ $comment->product->name }}">
                            </td>
                            <td class="ps-4 ">{{ $comment->content }}</td>
                            @if ($comment->status === 'pending')
                            <td class="ps-4 rounded text-warning">{{ $comment->status }} <i
                                    class="fas fa-spinner h6 text-warning ps-2"></i> </td>
                            @else
                            <td class="ps-4 rounded text-success">{{ $comment->status }} <i
                                    class="fas fa-check h6 text-success ps-2"></i></td>
                            @endif
                            <td class=" pe-4 ps-4">
                                <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                    href="{{ route('comments.edit',$comment->id) }}"><i class="fas fa-edit h6"></i></a>
                                <form class=" d-inline-block" method="POST"
                                    action="{{ route('comments.destroy',$comment->id) }}">
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
            @endif
        </div>
    </section>
    <!-- Basic Tables end -->

    {{-- order table --}}
    <section class="section mt-4">
        <div class="card">
            @if (count($orders) == 0)
            <h3 class="text-center p-3 "> <span class="text-capitalize">{{ $user->name }}</span> does not have any
                orders yet!</h3>
            @else
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <th class="font-weight-bolder">#</th>
                        <th class="font-weight-bolder"> User Name</th>
                        <th class="font-weight-bolder"> Order Status</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="ps-4"> {{ $order->id }} </td>
                            <td class="ps-4">{{ $order->user->name }} </td>
                            @if ($order->status === 'Pending')
                            <td class="ps-4 rounded text-warning">{{ $order->status }} <i
                                    class="fas fa-spinner h6 text-warning ps-2"></i> </td>
                            @else
                            <td class="ps-4 rounded text-success">{{ $order->status }} <i
                                    class="fas fa-check h6 text-success ps-2"></i></td>
                            @endif
                            <td class=" ps-4 pe-0  text-right">
                                <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                    href="{{ route('ordersDetails.show',$order->id) }}">
                                    <i class="fas fa-eye h6"></i>
                                </a>
                                <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                    href="{{ route('orders.edit',$order->id) }}"><i class="fas fa-edit h6"></i></a>
                            </td>
                            <td class="ps-0">
                                <form method="POST" action="{{ route('orders.destroy',$order->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-dark  mb-0" type="submit"><i
                                            class="fas fa-trash h6"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>

    {{-- address --}}
    <section class="section mt-4">
        <div class="card">
            @if (count($address) == 0)
            <h3 class="text-center p-3 "> <span class="text-capitalize">{{ $user->name }}</span> does not add his/her
                address yet!</h3>
            @else
            <table class="table align-items-center justify-content-center mb-0 ">
                <thead>
                    <th class="font-weight-bolder"> Country</th>
                    <th class="font-weight-bolder"> City</th>
                    <th class="font-weight-bolder"> Street</th>
                </thead>
                <tbody>
                    <tr>
                        @dd($address)
                        <td class="ps-4 ">{{ $address->country }}</td>
                        <td class="ps-4 ">{{ $address->city }}</td>
                        <td class="ps-4 ">{{ $address->street }}</td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
</div>
</section>

@endsection
