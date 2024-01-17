@extends('layouts.app')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Update Item Type</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <a class="modal-effect btn btn-primary d-grid mb-3" style="font-weight: bold;" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">Add</a>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            
            @if(Session::has('success'))
                <div class="alert alert-solid-danger alert-dismissible fade show">
                    {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            @endif

            @if(Session::has('fail'))                
                <div class="alert alert-solid-danger alert-dismissible fade show">
                    {{Session::get('fail')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            @endif

            <!-- Start:: row-1 -->
            <div class="row">
                <div class="col-xl-7">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                    <div class="card-title">Update</div>
                    </div>
                    <form action="{{route('itemType.update', [$item->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                placeholder="Item Name"
                                name="itemType" value="{{$item->name ?? old('itemType')}}"
                                />
                                <label for="floatingInput">Item Name</label>
                                @error('itemType')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" >Update</button> 
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- End:: row-1 -->

            <!-- Start:: row-4 -->
            <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Item Types</div>
                                                
                </div>
                <div class="card-body">
                    <table
                        id="file-export"
                        class="table table-bordered text-nowrap"
                        style="width: 100%"
                    >
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($getAllItemTypes as $itemType)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{$itemType->name}}</td>
                                    <td>{{$itemType->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a href="{{route('itemType.edit', $itemType->id)}}">
                                            <button class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line align-middle me-2 d-inline-block"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="{{route('itemType.delete', $itemType->id)}}">
                                            <button class="btn btn-sm btn-danger btn-wave">
                                                <i class="ri-delete-bin-line align-middle me-2 d-inline-block"></i>
                                                Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- End:: row-4 -->
        </div>
    </div> <!-- End::app-content -->
@endsection