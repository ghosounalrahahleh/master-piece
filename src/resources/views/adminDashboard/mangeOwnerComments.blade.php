@extends('adminDashboard.layouts.master')
@section('title','Manage comments')
@section('content')

<div class="container-fluid py-4">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-9 text-dark"
                    href="{{ route('statics.index') }}">Dashboard &nbsp; </a>
            </li>
            <a href="{{ route('products.index') }}">
                <li class="breadcrumb-item text-sm text-dark active opacity-9" aria-current="page"> / Products</li>
            </a>
            <li class="breadcrumb-item text-sm text-dark active opacity-9" aria-current="page">&nbsp;/&nbsp;
                {{ $product_name->name}}</li>
        </ol>
    </nav>
    <div class="row">

        {{-- Table Start --}}
        <div class="col-12 ">
            @if ($comments[0]===null)
            <h2>There is no comment yet!</h2>
            @else

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Comments table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <th class=" font-weight-bolder">#</th>
                                        <th class=" font-weight-bolder"> user Name</th>
                                        <th class=" font-weight-bolder"> comment Content</th>
                                        <th class=" font-weight-bolder"> comment Rate</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                        <tr>
                                            <td class="ps-4"> {{ $comment->id }} </td>
                                            <td class="ps-4">{{ $comment->user->name }} </td>
                                            <td class="ps-4">{{ $comment->content }}</td>
                                            <td class="ps-4 ">{{ $comment->rate }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                    <!-- Basic Tables end -->

                    {{-- pagination part --}}
                    <div class="d-flex justify-content-center mt-3">
                        {!! $comments->links() !!}
                    </div>
                    {{-- end pagination part --}}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
