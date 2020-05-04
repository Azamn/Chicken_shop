@extends('Admin.layouts.base')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Merchant</h4>

            </div>
            <div class="card-body">
                <form  method="post" action="{{ route('merchant.update' , $id) }}"
                       enctype="multipart/form-data" id="productCreateForm">

                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Name</label>
                                <input id="name" type="text" name="name" value="{{$merchant->name}}" class="form-control" >

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="email" for="price" class="bmd-label-floating">Email</label>
                                <input type="email" name="email" value="{{$merchant->email}}" class="form-control" >

                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="bmd-label-floating">Password</label>
                                <input id="password" type="password" name="password" value="{{ $merchant->password }}" class="form-control" >

                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_no" class="bmd-label-floating">Contact No</label>
                                <input id="contact_no" type="number" name="contact_no" value="{{ $merchant->contact_no }}" class="form-control" >

                                @error('contact_no')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="bmd-label-floating">Address</label>
                                <input id="address" type="text" name="address" value="{{ $merchant->address }}" class="form-control" >

                                @error('address')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shop_name" class="bmd-label-floating">Shop Name</label>
                                <input id="shop_name" type="text" name="shop_name" value="{{ $merchant->shop_name }}" class="form-control" >

                                @error('shop_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="bmd-label-floating">Latitude</label>
                                <input id="latitude" type="text" name="latitude1" value="{{ $merchant->latitude1 }}" class="form-control" >

                                @error('latitude')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="bmd-label-floating">Longitude</label>
                                <input id="longitude" type="text" name="longitude1" value="{{ $merchant->longitude1 }}" class="form-control" >

                                @error('longitude')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <img style="width: 100px; height:100px"--}}
{{--                                         src="/storage/merchant/documents/{{ $merchant->document }}"/>--}}
{{--                                </div>--}}
{{--                                <div class="btn" style="background-color: #ab47bc">--}}
{{--                                    <span>Upload Document</span>--}}
{{--                                    <input id="document" type="file" name="document" >--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <button type="submit" style=" float:right;background-color: #43a047" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

@endsection
