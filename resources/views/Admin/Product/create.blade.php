@extends('Admin.layouts.base')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Merchant</h4>

            </div>
            <div class="card-body">
                <form  method="post" action="{{ route('merchant.store') }}"
                      enctype="multipart/form-data" id="merchantCreateForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Username</label>
                                <input id="name" type="text" name="name" class="form-control" >

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="email" for="email" class="bmd-label-floating">Email address</label>
                                <input type="email" name="email" class="form-control" >

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
                                <input id="password" type="password" name="password" class="form-control" >

                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_no" class="bmd-label-floating">Contact No</label>
                                <input id="contact_no" type="number" name="contact_no" class="form-control">

                                @error('contact_no')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="bmd-label-floating">Adress</label>
                                <input id="address" type="text" name="address" class="form-control">

                                @error('address')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shop_name" class="bmd-label-floating">Shop Name</label>
                                <input id="shop_name" type="text" name="shop_name" class="form-control" >

                                @error('shop_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="file-field input-field">
                                    <div class="btn" style="background-color: #ab47bc">
                                        <span>Upload Document</span>
                                        <input id="document" type="file" name="document" >

                                        @error('document')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="bmd-label-floating">Latitude</label>
                                <input id="latitude" type="text" name="latitude" class="form-control" >

                                @error('latitude')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="bmd-label-floating">Longitude</label>
                                <input id="longitude" type="text" name="longitude" class="form-control" >

                                @error('longitude')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

@endsection
