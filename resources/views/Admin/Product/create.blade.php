@extends('Admin.layouts.base')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Product</h4>

            </div>
            <div class="card-body">
                <form  method="post" action="{{ route('product.store') }}"
                      enctype="multipart/form-data" id="productCreateForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Name</label>
                                <input id="name" type="text" name="name" class="form-control" >
                                <small id="name" class="form-text text-muted mb-4">
                                    Enter product name.
                                </small>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="price" for="price" class="bmd-label-floating">Price</label>
                                <input type="number" name="price" class="form-control" >
                                <small id="price" class="form-text text-muted mb-4">
                                    Enter product price, use only number.
                                </small>
                                @error('price')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="bmd-label-floating">Quantity</label>
                                <input id="quantity" type="text" name="quantity" class="form-control" >
                                <small id="quantity" class="form-text text-muted mb-4">
                                    Enter quantity in 100gms to 1000gms.
                                </small>
                                @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="file-field input-field">
                                    <div class="btn" style="background-color: #ab47bc">
                                        <span>Upload Image</span>
                                        <input id="image" type="file" name="image" >

                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <small id="image" class="form-text text-muted mb-4">
                                        Upload product image.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" style="background-color: #43a047" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

@endsection
