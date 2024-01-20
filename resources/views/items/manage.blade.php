@extends('layouts.app')

@section('custom-css')

@endsection

@section('content')

<div class="main-content app-content">
  <div class="container-fluid">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="mb-10">
            <h1 class="page-title fw-semibold fs-18 mb-0">Items</h1>
            <span>List of all Available Items</span>
        </div>
      <div class="ms-md-1 ms-0">
        @if(auth()->user()->hasRightTo('addItem'))
            <a class="modal-effect btn btn-dark d-grid mb-3" style="font-weight: bold;" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#addNewItem">Add New Item</a>
        @endif
      </div>
    </div>

    
    <!-- Start:: row-4 -->
    <div class="row">
      <div class="col-xl-12">
        
        @if(Session::has('alert'))
            <div class="alert alert-solid-{{ Session::get('alert') }} alert-dismissible fade show">
                {{Session::get('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        @endif

        <div class="card custom-card">
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>
                                    
                                    <button class="btn btn-sm btn-info btn-wave" data-bs-toggle="modal" data-bs-target="#editItemModal" onclick="setItemToEdit({
                                        id: '{{ $item->id }}',
                                        name: '{{ $item->name }}',
                                        typeId: '{{ $item->type->id }}',
                                        price: '{{ $item->price }}',
                                    })">
                                        <i class="ri-edit-line align-middle me-2 d-inline-block"></i>
                                        Edit
                                    </button>
                                   
                                    <button class="btn btn-sm btn-danger btn-wave" data-bs-toggle="modal" data-bs-target="#deleteItemModal" onclick="setItemToDelete({
                                        id: '{{ $item->id }}',
                                        name: '{{ $item->name }}'
                                    })">
                                        <i class="ri-delete-bin-line align-middle me-2 d-inline-block"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Add Item Modal --}}
        <div class="modal fade" id="addNewItem">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add an Item</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-start">   
                        <form action="{{route('items.store')}}" method="post">
                            @csrf                             
                            <div class="col-xl-12 color-selection"> 
                                <label for="product-itemType-add" class="form-label">Item Type</label>
                                <select class="form-control" name="typeId" value="{{old('typeId')}}" id="product-itemType-add">
                                    <option value="">--Select Item Type</option>
                                    @foreach($itemTypes as $itemType)
                                        <option value="{{$itemType->id}} @if(old('typeId') == $itemType->id) selected @endif">{{$itemType->name}}</option>
                                    @endforeach
                                </select>
                                @error('typeId')
                                    <label for="product-itemType-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="col-xl-12 mt-4"> 
                                <label for="product-name-add" class="form-label">Item Name</label> 
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Enter Item Name" required /> 
                                @error('name')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="col-xl-12 mt-4"> 
                                <label for="product-price-add" class="form-label">Item Price</label> 
                                <input type="number" class="form-control" id="product-price-add" value="{{old('price')}}" name="price" placeholder="Enter Price" required> 
                                @error('price')
                                    <label for="product-price-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="col-xl-12 mt-4"> 
                                <button type="submit" class="btn btn-dark">Submit</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Item Card -->
        <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Item <strong><span id="itemNameHeader"></span></strong></h6> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">   
                        <form action="{{route('items.update')}}" method="post">
                            @csrf 
                            @method('put')

                            <input type="hidden" name="id" id="itemId" />

                            <div class="col-xl-12 color-selection"> 
                                <label for="product-itemType-add" class="form-label">Item Type</label>
                                <select class="form-control" name="typeId" id="typeId" value="{{old('typeId')}}" id="product-itemType-add">
                                    <option value="">--Select Item Type</option>
                                    @foreach($itemTypes as $itemType)
                                        <option value="{{$itemType->id}}" @if(old('typeId') == $itemType->id) selected @endif>{{ $itemType->name }}</option>
                                    @endforeach
                                </select>
                                @error('typeId')
                                    <label for="product-itemType-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{ $message }}</label> 
                                @enderror
                            </div>
                            <div class="col-xl-12 mt-4"> 
                                <label for="product-name-add" class="form-label">Item Name</label> 
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" id="itemName" placeholder="Enter Item Name" required /> 
                                @error('name')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <div class="col-xl-12 mt-4"> 
                                <label for="product-price-add" class="form-label">Item Price</label> 
                                <input type="number" class="form-control" id="itemPrice" value="{{old('price')}}" name="price" placeholder="Enter Price" required> 
                                @error('price')
                                    <label for="product-price-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0" style="color: red !important;">*{{$message}}</label> 
                                @enderror
                            </div>
                            <br /><br />
                            <div class="col-xl-12 mt-4flex justify-between mt-10 w-full">
                                <button type="submit" class="btn btn-dark">Update</button> 
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close" style="margin-left:10px">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Delete Item Card -->
        <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="">Confirm Delete Item </h6> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 

                        <p>Are you sure you want to delete <strong><span id="d-itemName">Item</span></strong> from the Database? You cannot undo this action </p>

                        <form method="post" action="{{ route('items.delete') }}">
                            @csrf 

                            <input type="hidden" name="id" id="d-itemId" />
                            
                            <br /><br />
                            <div class="flex justify-between mt-10 w-full">
                                <button type="submit" class="btn btn-dark">Yes! Delete</button> 
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close" style="margin-left:10px">No! Cancel</button>
                            </div>
                            
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
       

      </div>
    </div>
    <!-- End:: row-4 -->
  </div>
</div>

@endsection


@section('custom-js')
<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<!-- Internal Datatables JS -->
<script src="{{asset('assets/js/datatables.js')}}"></script>

<script>
    const setItemToDelete = (item) => {
        setValue('d-itemId', item.id);
        setInnerHtml('d-itemName', item.name);
    }

    const setItemToEdit = (item) => {
        setInnerHtml('itemNameHeader', `( ${item.name} )`);
        setValue('itemId', item.id);  
        setValue('itemName', item.name);
        setValue('itemPrice', item.price);
        setSelected('typeId', item.typeId);
    }
</script>
@endsection