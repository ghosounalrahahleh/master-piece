@extends('adminDashboard.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card card-body mx-3 mx-md-4 ">
            <div class="container">
                <div class="main-body">

                      <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                  <h4>John Doe</h4>
                                  <p class="text-secondary mb-1">Full Stack Developer</p>
                                  <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>

                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                              </div>
                              <hr>

                              <div class="row ">
                                <div class="col-sm-12 d-flex justify-content-end">
                                  <a class="btn btn-info" target="__blank" href="">Edit</a>
                                </div>
                              </div>
                            </div>
                          </div>




                        </div>
                      </div>

                    </div>
                </div>
          </div>
    </div>
</div>
@endsection

