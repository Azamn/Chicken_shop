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
                                <small id="name" class="form-text text-muted mb-4">
                                    Enter your full-name
                                </small>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="email" for="email" class="bmd-label-floating">Email address</label>
                                <input type="email" name="email" class="form-control" >
                                <small id="email" class="form-text text-muted mb-4">
                                    Enter your valid email-id
                                </small>

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
                                <small id="password" class="form-text text-muted mb-4">
                                    Enter your password.
                                </small>

                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_no" class="bmd-label-floating">Contact No</label>
                                <input id="contact_no" type="number" name="contact_no" class="form-control">
                                <small id="contact_no" class="form-text text-muted mb-4">
                                    Enter your valid 10 digit mobile number
                                </small>

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
                                <small id="address" class="form-text text-muted mb-4">
                                    Enter your valid Address
                                </small>

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
                                <small id="shop_name" class="form-text text-muted mb-4">
                                    Enter your valid shop-name
                                </small>
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
                                    <small id="document" class="form-text text-muted mb-4">
                                        Upload your correct document in image format
                                    </small>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permission" class="bmd-label-floating">Delivery Permission</label><br>
                                    <small id="permission" class="form-text text-muted mb-4">
                                        Select delivery permission of merchant
                                    </small>
                                    <input type="checkbox" name="delivery_permission[]" id="self_pickup" value="self_pickup">
                                    <label for="self_pickup">Self Pickup</label> <br>
                                    <input type="checkbox" name="delivery_permission[]" id="scheduled_delivery" value="scheduled_delivery">
                                    <label for="scheduled_delivery">Scheduled Delivery</label> <br>
                                    <input type="checkbox" name="delivery_permission[]" id="express_delivery" value="express_delivery">
                                    <label for="express_delivery">Express Delivery</label>


                                    @error('permission')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="coordinates" class="bmd-label-floating"> Select Co-ordinates</label>
                                <select class="form-control" id="coordinates" name="coordinates">
                                    <option selected value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
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
                                    <small id="latitude1" class="form-text text-muted mb-4">
                                        Enter Latitude value 1
                                    </small>
                                    @error('latitude1')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude1" class="bmd-label-floating">Longitude 1</label>
                                    <input id="longitude1" type="text" name="longitude1" class="form-control" >
                                    <small id="longitude1" class="form-text text-muted mb-4">
                                        Enter longitude value 1
                                    </small>

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
                                    <small id="latitude2" class="form-text text-muted mb-4">
                                        Enter Latitude value 2
                                    </small>
                                    @error('latitude2')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude2" class="bmd-label-floating">Longitude 2</label>
                                    <input id="longitude2" type="text" name="longitude2" class="form-control" >
                                    <small id="longitude2" class="form-text text-muted mb-4">
                                        Enter longitude value 2
                                    </small>
                                    @error('longitude2')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude3" class="bmd-label-floating">Latitude 3</label>
                                    <input id="latitude3" type="text" name="latitude3" class="form-control" >
                                    <small id="latitude3" class="form-text text-muted mb-4">
                                        Enter Latitude value 3
                                    </small>
                                    @error('latitude3')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude3" class="bmd-label-floating">Longitude 3</label>
                                    <input id="longitude3" type="text" name="longitude3" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
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
                                    <small id="latitude4" class="form-text text-muted mb-4">
                                        Enter Latitude value 4
                                    </small>
                                    @error('latitude')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude4" class="bmd-label-floating">Longitude 4</label>
                                    <input id="longitude4" type="text" name="longitude4" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude4')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates5"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude5" class="bmd-label-floating">Latitude 5</label>
                                    <input id="latitude5" type="text" name="latitude5" class="form-control" >
                                    <small id="latitude5" class="form-text text-muted mb-4">
                                        Enter Latitude value 5
                                    </small>
                                    @error('latitude5')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude5" class="bmd-label-floating">Longitude 5</label>
                                    <input id="longitude5" type="text" name="longitude5" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude5')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates6"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude6" class="bmd-label-floating">Latitude 6</label>
                                    <input id="latitude6" type="text" name="latitude6" class="form-control" >
                                    <small id="latitude6" class="form-text text-muted mb-4">
                                        Enter Latitude value 6
                                    </small>
                                    @error('latitude6')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude6" class="bmd-label-floating">Longitude 6</label>
                                    <input id="longitude6" type="text" name="longitude6" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude6')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates7"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude7" class="bmd-label-floating">Latitude 7</label>
                                    <input id="latitude7" type="text" name="latitude7" class="form-control" >
                                    <small id="latitude7" class="form-text text-muted mb-4">
                                        Enter Latitude value 7
                                    </small>
                                    @error('latitude7')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude7" class="bmd-label-floating">Longitude 7</label>
                                    <input id="longitude7" type="text" name="longitude7" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude7')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates8"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude8" class="bmd-label-floating">Latitude 8</label>
                                    <input id="latitude8" type="text" name="latitude8" class="form-control" >
                                    <small id="latitude8" class="form-text text-muted mb-4">
                                        Enter Latitude value 8
                                    </small>
                                    @error('latitude8')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude8" class="bmd-label-floating">Longitude 8</label>
                                    <input id="longitude8" type="text" name="longitude8" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude8')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates9"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude9" class="bmd-label-floating">Latitude 9</label>
                                    <input id="latitude9" type="text" name="latitude9" class="form-control" >
                                    <small id="latitude3" class="form-text text-muted mb-4">
                                        Enter Latitude value 9
                                    </small>
                                    @error('latitude9')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude9" class="bmd-label-floating">Longitude 9</label>
                                    <input id="longitude9" type="text" name="longitude9" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude9')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="coordinates10"  style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude10" class="bmd-label-floating">Latitude 10</label>
                                    <input id="latitude10" type="text" name="latitude10" class="form-control" >
                                    <small id="latitude10" class="form-text text-muted mb-4">
                                        Enter Latitude value 10
                                    </small>
                                    @error('latitude10')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude10" class="bmd-label-floating">Longitude 10</label>
                                    <input id="longitude10" type="text" name="longitude10" class="form-control" >
                                    <small id="longitude3" class="form-text text-muted mb-4">
                                        Enter longitude value 3
                                    </small>
                                    @error('longitude10')
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
                if (no_of_coordinates == 3) {
                    $('#coordinates3').show();
                    $('#coordinates4').hide();
                    $('#coordinates5').hide();
                    $('#coordinates6').hide();
                    $('#coordinates7').hide();
                    $('#coordinates8').hide();
                    $('#coordinates9').hide();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 4) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').hide();
                    $('#coordinates6').hide();
                    $('#coordinates7').hide();
                    $('#coordinates8').hide();
                    $('#coordinates9').hide();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 5) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').show();
                    $('#coordinates6').hide();
                    $('#coordinates7').hide();
                    $('#coordinates8').hide();
                    $('#coordinates9').hide();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 6) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').show();
                    $('#coordinates6').show();
                    $('#coordinates7').hide();
                    $('#coordinates8').hide();
                    $('#coordinates9').hide();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 7) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').show();
                    $('#coordinates6').show();
                    $('#coordinates7').show();
                    $('#coordinates8').hide();
                    $('#coordinates9').hide();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 8) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').show();
                    $('#coordinates6').show();
                    $('#coordinates7').show();
                    $('#coordinates8').show();
                    $('#coordinates9').hide();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 9) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').show();
                    $('#coordinates6').show();
                    $('#coordinates7').show();
                    $('#coordinates8').show();
                    $('#coordinates9').show();
                    $('#coordinates10').hide();
                }
                if (no_of_coordinates == 10) {
                    $('#coordinates3').show();
                    $('#coordinates4').show();
                    $('#coordinates5').show();
                    $('#coordinates6').show();
                    $('#coordinates7').show();
                    $('#coordinates8').show();
                    $('#coordinates9').show();
                    $('#coordinates10').show();
                }
            });
        });
    </script>

