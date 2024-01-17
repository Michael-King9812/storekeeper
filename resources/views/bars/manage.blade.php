@extends('layouts.app')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Manage Bar Stock</h1>
                <div class="ms-md-1 ms-0">
                    <!-- <nav>
                        <a class="modal-effect btn btn-primary d-grid mb-3" style="font-weight: bold;" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">Add</a>
                    </nav> -->
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
                    <div class="card-title">Stock</div>
                                                
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
                                <th scope="col">Item Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <!-- <th scope="col">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($stocks as $stock)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{App\Models\ItemType::find(App\Models\Item::find($stock->item_id)->item_type_id)->name}}</td>
                                    <td>{{App\Models\Item::find($stock->item_id)->name}}</td>
                                    <td>{{$stock->qty}}</td>
                                    <td>{{$stock->updated_at->format('d-m-Y')}}</td>
                                    <!-- <td>
                                        <a href="{{route('stock.edit', $stock->id)}}">
                                            <button class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line align-middle me-2 d-inline-block"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="{{route('stock.delete', [$stock->id])}}">
                                            <button class="btn btn-sm btn-danger btn-wave">
                                                <i class="ri-delete-bin-line align-middle me-2 d-inline-block"></i>
                                                Delete
                                            </button>
                                        </a>
                                    </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- End:: row-4 -->

            <!-- <div class="modal fade"  id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <form action="{{route('stock.store')}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title">Add Stock</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">                                
                               
                                <div class="col-xl-12"> 
                                    <label for="product-name-add" class="form-label">Item Name</label> 
                                    <select class="form-control" name="item" value="{{old('item')}}" id="product-name-add">
                                        <option value="">--Select Item Type</option>
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="product-quantity-add" class="form-label">Stock Quantity</label> 
                                    <input type="number" class="form-control" id="product-quantity-add" value="{{old('quantity')}}" name="quantity" placeholder="Enter Quantity"> 
                                    @error('quantity')
                                        <label for="product-quantity-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" >Add</button> 
                                <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->

        </div>
    </div> <!-- End::app-content -->
    
@endsection