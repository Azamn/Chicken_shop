@extends('Admin.layouts.base')

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

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
                                <label for="coordinates" class="bmd-label-floating">Co-ordinates</label>
                                <select class="form-control" id="coordinates" name="coordinates">
                                    <option selected value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="coordinates1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude1" class="bmd-label-floating">Latitude 1</label>
                                    <input id="latitude1" type="text" name="latitude1" class="form-control" >

                                    @error('latitude1')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude1" class="bmd-label-floating">Longitude 1</label>
                                    <input id="longitude1" type="text" name="longitude1" class="form-control" >

                                    @error('longitude1')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude"2 class="bmd-label-floating">Latitude 2</label>
                                    <input id="latitude2" type="text" name="latitude2" class="form-control" >

                                    @error('latitude2')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude2" class="bmd-label-floating">Longitude 2</label>
                                    <input id="longitude2" type="text" name="longitude2" class="form-control" >

                                    @error('longitude2')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates3" style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude3" class="bmd-label-floating">Latitude 3</label>
                                    <input id="latitude3" type="text" name="latitude3" class="form-control" >

                                    @error('latitude3')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude3" class="bmd-label-floating">Longitude 3</label>
                                    <input id="longitude3" type="text" name="longitude3" class="form-control" >

                                    @error('longitude3')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates4"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude4" class="bmd-label-floating">Latitude 4</label>
                                    <input id="latitude4" type="text" name="latitude4" class="form-control" >

                                    @error('latitude')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude4" class="bmd-label-floating">Longitude 4</label>
                                    <input id="longitude4" type="text" name="longitude4" class="form-control" >

                                    @error('longitude4')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
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

    <script>
        $(document).ready(function () {
            $('#coordinates').on('change', function () {
                var no_of_coordinates = $('#coordinates').val();
                if (no_of_coordinates == 2) {
                    $('#coordinates3').hide();
                    $('#coordinates4').hide();
                }
                if (no_of_coordinates == 3) {
                    $('#coordinates3').show();
                    $('#coordinates4').hide();
                }
                if (no_of_coordinates == 4) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                }
            });
        });
    </script>

