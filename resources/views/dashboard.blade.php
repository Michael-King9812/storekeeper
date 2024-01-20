@extends('layouts.app')

@section('stylesheets')

@endsection

@section('content')

<div class="main-content app-content">
  <div class="container-fluid">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="mb-10">
            <h1 class="page-title fw-semibold fs-18 mb-0">Hi, {{ auth()->user()->firstName() }}</h1>
            <span>Here is your request statistics for Today and this Month</span>
        </div>
      <div class="ms-md-1 ms-0">
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
      </div>
    </div>

    
    <!-- Start:: row-4 -->
    <div class="row">
      <div class="col-xl-12">
        
      </div>
    </div>
    <!-- End:: row-4 -->
  </div>
</div>

@endsection


@section('script')

@endsection