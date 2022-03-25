@extends('adminDashboard.layouts.master')

@section('content')
<div class="container-fluid pb-4">
    {{-- <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-9 text-dark"
                    href="{{ route('statics.index') }}">Dashboard &nbsp; </a>
            </li>
            <a href="{{ route('products.index') }}">
                <li class="breadcrumb-item text-sm text-dark active opacity-9" aria-current="page"> / Products</li>
            </a>
        </ol>
    </nav> --}}
    <div class="row justify-content-center">
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
                    <div class="purple shadow-primary border-radius-lg py-3 pe-1">
                        <h5 class="text-white text-capitalize ps-3">Products Form</h5>
                    </div>
                </div>
                <div class="card-body">

                    <form role="form" class="text-start" method="POST"
                        action="@if($update === true){{ route('products.update',$product->id) }} @else {{ route('products.store') }} @endif"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="form-label">Product Name</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="name" class="form-control"
                                value="@if($update==true){{ $product->name }}@endif" placeholder="" required>
                        </div>
                        <label class="form-label">Product Description</label>
                        <div class="input-group input-group-outline mb-3">
                            <textarea type="text" name="description" class="form-control" placeholder=""
                                required> @if($update==true){{ $product->description }}@endif</textarea>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">Product Price</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Product Sale Price</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="sale_price" class="form-control"
                                        value="@if($update==true){{ $product->sale_price }}@endif" placeholder=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Quantity</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="quantity" class="form-control"
                                        value="@if($update==true){{ $product->quantity }}@endif" placeholder=""
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-4">
                                <label class="form-label">Color</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="color" class="form-control"
                                        value="@if($update==true){{ $product->color }}@endif" placeholder="Color"
                                        required>
                                </div>
                            </div>
                            <div class=" col-4">
                                <label class="form-label">Size</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="size" class="form-control"
                                        value="@if($update==true){{ $product->size }}@endif" placeholder="" required>
                                </div>
                            </div>
                            <div class=" col-4">
                                <label class="form-label">Tag</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="tag" class="form-control"
                                        value="@if($update==true){{ $product->tag }}@endif" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">Is New</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control form-select w-100   p-2" name="is_new" required>
                                        @if ($update===true)
                                        <option class='w-100' value='{{ $product->is_new}}' selected>
                                            {{ $product->is_new }}</option>
                                        @else
                                        <option class='w-100' value=''> select option... </option>
                                        @endif
                                        <option class='w-100' value='0'>No</option>
                                        <option class='w-100' value='1'>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Is on Sale</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control form-select w-100   p-2" name="is_onSale" required>
                                        @if ($update===true)
                                        <option class='w-100' value='{{ $product->is_onSale}}' selected>
                                            {{ $product->is_onSale }}</option>
                                        @else
                                        <option class='w-100' value=''>select option...</option>
                                        @endif
                                        <option class='w-100' value='0'>No</option>
                                        <option class='w-100' value='1'>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Category</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-select w-100   p-2" name='category_id' value="" required>
                                        @if ($update===true)
                                        <option class='w-100' value='{{ $product->category->id }}' selected>{{
                                            $product->category->name }}</option>
                                        @else
                                        <option class='w-100' value=''>Select product </option>
                                        @endif
                                        @foreach ($categories as $category)
                                        <option class='w-100' value='{{ $category->id }}'>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-4">
                                <div class=" input-group input-group-outline mb-3">
                                    <input type="file" name="main_image" class="form-control " required>
                                </div>
                            </div>
                            <div class=" col-4">
                                <div class="input-group input-group-outline mb-3 ">
                                    <input type="file" name="second_image" class="form-control ">
                                </div>
                            </div>
                            <div class=" col-4">
                                <div class="input-group input-group-outline mb-3 ">
                                    <input type="file" name="third_image" class="form-control ">
                                </div>
                            </div>
                        </div>



                        @if ($update === false)
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <button type="submit" class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Add
                                        to products</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-end">
                            <div class=" col-4 ">
                                <div class="text-center">
                                    <form action="{{ route('products.update',$product->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="btn purple bg-gradient-primary w-100 my-4 h6 mb-2">Update
                                            product</button>
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
                    <div class="purple shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Products table</h6>
                    </div>
                </div>
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th class=" font-weight-bolder"> Product image</th>
                                        <th class=" font-weight-bolder"> Product Name</th>
                                        <th class=" font-weight-bolder"> Price</th>
                                        <th class=" font-weight-bolder"> On Sale </th>
                                        <th class=" font-weight-bolder"> Is New </th>
                                        <th class=" font-weight-bolder"> Owner </th>
                                        <th class=" font-weight-bolder"> Category </th>
                                        <th class=" font-weight-bolder"></th>
                                        <th class=" font-weight-bolder"></th>
                                        <th class=" font-weight-bolder"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="ps-4"><img width="100px" height="100px"
                                                src="{{ asset($product->main_image) }}" alt="product image"></td>
                                        <td class="ps-4">{{ $product->name }} </td>
                                        <td class="ps-4">{{ $product->price }} </td>
                                        <td class="ps-4"> {{ $product->is_onSale }}</td>
                                        <td class="ps-4"> {{ $product->is_new}}</td>
                                        <td class="ps-4"> {{ $product->owner->name}}</td>
                                        <td class="ps-4"> {{ $product->category->name}}</td>
                                        <td class="ps-4 pe-0  text-right"> <a
                                                class="btn btn-link text-dark text-gradient px-3 mb-0"
                                                href="{{ route('comments.show',$product->id) }}">
                                                <i class="fas fa-eye h6"></i>
                                            </a></td>
                                        <td class=" pe-0  text-right">
                                            <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                                href="{{ route('products.edit',$product->id) }}">
                                                <i class="fas fa-edit h6"></i>
                                            </a>

                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('products.destroy',$product->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link text-dark px-3 mb-0" type="submit">
                                                    <i class="fas fa-trash h6"></i>
                                                </button>
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
