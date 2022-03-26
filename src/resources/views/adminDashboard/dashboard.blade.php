@extends('adminDashboard.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-sm-6 mb-xl-5 mb-4">
        <div class="card px-xl-4">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <h3 class=" mb-3 text-capitalize">Orders</h3>
              <h1 class="mb-0">{{ $orderDetails }}</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mb-xl-5 mb-4">
        <div class="card px-xl-4">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <h3 class=" mb-3 text-capitalize"> Users</h3>
              <h1 class="mb-0">{{ $users  }}</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mb-xl-5 mb-4">
        <div class="card px-xl-4">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <h3 class=" mb-3 text-capitalize">Total Products</h3>
              <h1 class="mb-0">{{ $products }}</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mb-xl-5 mb-4 ">
        <div class="card px-xl-4">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <h3 class=" mb-3 text-capitalize">Sales</h3>
              <h1 class="mb-0">{{ $sales }} JD</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
    </div>



  </div>
@endsection
