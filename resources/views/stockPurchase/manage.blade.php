@extends('layouts.app')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Manage Stock Purchases</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <a class="modal-effect btn btn-primary d-grid mb-3" style="font-weight: bold;" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">Add</a>
                    </nav>
                </div>
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
                            
                            @foreach($stockPurchase as $stockPurchase)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{App\Models\Item::where('id', $stockPurchase->item_id)->first()->name}}</td>
                                    <td>{{$stockPurchase->price}}</td>
                                    <td>{{$stockPurchase->qty}}</td>
                                    <td>{{$stockPurchase->purchased_by}}</td>
                                    <td>{{$stockPurchase->created_at->format('d-m-Y')}}</td>
                                    <td>                                        
                                        <button class="btn btn-sm btn-danger btn-wave" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="ri-delete-bin-line align-middle me-2 d-inline-block"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>


                                <!-- Delete Modal Card -->
                                <div class="card-body">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel1">Modal title</h6> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"> Are you sure you want to delete Store Stock Items? </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('stockPurchase.delete', [$stockPurchase->id])}}">
                                                        <button type="button" class="btn btn-primary">Delete</button> 
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- End:: row-4 -->

            <div class="modal fade"  id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <form action="{{route('stockPurchase.store')}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title">Add Stock Purchase</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">                                
                                <div class="col-xl-12 color-selection"> 
                                    <label for="product-item-add" class="form-label">Item Type</label>
                                    <select class="form-control" name="item" value="{{old('item')}}" id="product-item-add">
                                        <option value="">--Select Item</option>
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item')
                                        <label for="product-item-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="product-price-add" class="form-label">Item Price</label> 
                                    <input type="number" class="form-control" id="product-price-add" value="{{old('price')}}" name="price" placeholder="Enter Price"> 
                                    @error('price')
                                        <label for="product-price-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="product-quantity-add" class="form-label">Item Quantity</label> 
                                    <input type="number" class="form-control" id="product-quantity-add" value="{{old('quantity')}}" name="quantity" placeholder="Enter Item Quantity"> 
                                    @error('quantity')
                                        <label for="product-quantity-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="product-purchaser-add" class="form-label">Purchased By</label> 
                                    <input type="text" class="form-control" id="product-purchaser-add" value="{{old('purchaser')}}" name="purchaser" placeholder="Enter Item Purchaser"> 
                                    @error('purchaser')
                                        <label for="product-purchaser-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" >Create</button> 
                                <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- End::app-content -->
    
@endsection