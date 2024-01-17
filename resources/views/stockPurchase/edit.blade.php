@extends('layouts.app')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Update Stock Purchases</h1>
            </div> <!-- Page Header Close -->
            
            @if(Session::has('success'))
                <div class="alert alert-solid-success alert-dismissible fade show">
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
                    <form action="{{route('stock.update', [$stockPurchase->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingInput"
                                    placeholder="Item"
                                    name=" " value="{{App\Models\Item::find($stockPurchase->item_id)->name}}"
                                    disabled
                                />
                                <label for="floatingInput">Item Type</label>
                                @error('item')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingInput"
                                    placeholder="Quantity"
                                    name="quantity" value="{{$stockPurchase->qty ?? old('quantity')}}"
                                />
                                <label for="floatingInput">Stock Quantity</label>
                                @error('quantity')
                                    <label for="product-price-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
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
                    <div class="card-title">Stock Purchase</div>
                                                
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
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Purchaser</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            
                            @foreach($stockPurchases as $stockPurchase)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{App\Models\Item::where('id', $stockPurchase->item_id)->first()->name}}</td>
                                    <td>{{$stockPurchase->price}}</td>
                                    <td>{{$stockPurchase->qty}}</td>
                                    <td>{{$stockPurchase->purchased_by}}</td>
                                    <td>{{$stockPurchase->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a href="{{route('stockPurchase.edit', $stockPurchase->id)}}">
                                            <button class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line align-middle me-2 d-inline-block"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="{{route('stockPurchase.delete', [$stockPurchase->id])}}">
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