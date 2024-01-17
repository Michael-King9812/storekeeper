@extends('layouts.app')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Update Item</h1>
              
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
                    <form action="{{route('item.update', [$item->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="itemType" value="{{old('itemType')}}" id="product-itemType-add">
                                    <option value="{{$item->item_type_id}}">{{App\Models\ItemType::where('id', $item->item_type_id)->first()->name}}</option>
                                    @foreach(App\Models\ItemType::all() as $itemType)
                                        <option value="{{$itemType->id}}">{{$itemType->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingInput">Item Type</label>
                                @error('itemType')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingInput"
                                    placeholder="Item Name"
                                    name="item" value="{{$item->name ?? old('itemType')}}"
                                />
                                <label for="floatingInput">Item Price</label>
                                @error('itemType')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingInput"
                                    placeholder="Price"
                                    name="price" value="{{$item->price ?? old('price')}}"
                                />
                                <label for="floatingInput">Item Price</label>
                                @error('price')
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
                    <div class="card-title">Item</div>
                                                
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
                                <!-- <th scope="col">Date</th> -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{App\Models\ItemType::where('id', $item->item_type_id)->first()->name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <!-- <td>{{$item->created_at->format('d-m-Y')}}</td> -->
                                    <td>
                                        <a href="{{route('item.edit', $item->id)}}">
                                            <button class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line align-middle me-2 d-inline-block"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="{{route('item.delete', [$item->id])}}">
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

            <div class="modal fade"  id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <form action="{{route('item.store')}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title">Create Item</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">                                
                                <div class="col-xl-12 color-selection"> 
                                    <label for="product-itemType-add" class="form-label">Item Type</label>
                                    <select class="form-control" name="itemType" value="{{old('itemType')}}" id="product-itemType-add">
                                        <option value="">--Select Item Type</option>
                                        @foreach($itemTypes as $itemType)
                                            <option value="{{$itemType->id}}">{{$itemType->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('itemType')
                                        <label for="product-itemType-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="product-name-add" class="form-label">Item Name</label> 
                                    <input type="text" class="form-control" id="product-name-add" value="{{old('item')}}" name="item" placeholder="Enter Item Name"> 
                                    @error('item')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="product-price-add" class="form-label">Item Price</label> 
                                    <input type="text" class="form-control" id="product-price-add" value="{{old('price')}}" name="price" placeholder="Enter Price"> 
                                    @error('price')
                                        <label for="product-price-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
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