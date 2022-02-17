@extends('adminDashboard.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        {{-- Table Start --}}
        <div class="col-12 ">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="purple bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Comments table</h6>
                    </div>
                </div>
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <th class=" font-weight-bolder">#</th>
                                    <th class=" font-weight-bolder"> user Name</th>
                                    <th class=" font-weight-bolder"> Product Name</th>
                                    <th class=" font-weight-bolder"> Product Image</th>
                                    <th class=" font-weight-bolder"> comment Content</th>
                                    <th class=" font-weight-bolder"> comment Rate</th>
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
                                                alt="{{ $comment->product->name }}"></td>
                                        <td class="ps-4 ">{{ $comment->content }}</td>
                                        <td class="ps-4 ">{{ $comment->rate }}</td>
                                        <td class=" pe-4 ps-4 ">
                                            <form method="POST" action="{{ route('comments.destroy',$comment->id) }}">
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
