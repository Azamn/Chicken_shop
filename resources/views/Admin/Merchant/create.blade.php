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
                                <label for="name" class="bmd-label-floating">Partner Name</label>
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
                                <label id="email" for="email" class="bmd-label-floating">Partner Email address</label>
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
                                <label for="password" class="bmd-label-floating">Partner Password</label>

                                <input id="password" type="password" name="password" class="form-control" >
                                <input type="checkbox" onclick="myFunction()">Show Password
                                {{--                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="float: right; margin-left: -25px;--}}
{{--                                      margin-top: -25px;--}}
{{--                                      position: relative;--}}
{{--                                      z-index: 2;"> </span>--}}


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
                                <label for="contact_no" class="bmd-label-floating">Partner Contact No</label>
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
                                <label for="address" class="bmd-label-floating">Partner Adress</label>
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
                                <label for="shop_name" class="bmd-label-floating">Partner Shop Name</label>
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
                                <label for="shop_code" class="bmd-label-floating">Partner Shop Code</label>
                                <input id="shop_code" type="text" name="shop_code" class="form-control" >
                                <small id="shop_code" class="form-text text-muted mb-4">
                                    Enter your valid shop-code
                                </small>
                                @error('shop_code')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="chicken_type" class="bmd-label-floating">Partner Chicken-Type</label>
                                <small id="chicken_type" class="form-text text-muted mb-4">
                                    Select valid chicken type
                                </small>
                                <input type="radio" name="chicken_type" id="halal" value="halal">
                                <label for="halal"> Halal </label><br>
                                <input type="radio" name="chicken_type" id="not_halal" value="Not Halal" >
                                <label for="not_halal"> Not Halal </label>

                                @error('chicken_type')
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
                                        Upload your correct document in PDF format
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gst_no" class="bmd-label-floating">Partner GST-NO</label>
                                    <input id="gst_no" type="text" name="gst_no" class="form-control" >
                                    <small id="gst_no" class="form-text text-muted mb-4">
                                        Enter valid GST number
                                    </small>
                                    @error('gst_no')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="coordinates" class="bmd-label-floating"> Enter Co-ordinates</label><br>
                                <button class=" btn btn-success add_field_button">Add more co-ordinates</button>
                            </div>
                        </div>
                    </div>

                    <div class="co_ordinates">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="latitude" class="bmd-label-floating">Latitude </label>
                                    <input id="latitude" type="text" name="latitude[]" class="form-control" >
                                    <small id="latitude" class="form-text text-muted mb-4">
                                        Enter Latitude value
                                    </small>
                                    @error('latitude')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="longitude" class="bmd-label-floating">Longitude </label>
                                    <input id="longitude" type="text" name="longitude[]" class="form-control" >
                                    <small id="longitude" class="form-text text-muted mb-4">
                                        Enter longitude value
                                    </small>

                                    @error('longitude')
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
        $(document).ready(function() {
            var max_fields      = 50; //maximum input boxes allowed
            var wrapper   		= $(".co_ordinates"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row"><div class="col-md-5"><div class="form-group"><label for="latitude" class="bmd-label-floating">Latitude</label>' +
                        '<input id="latitude" type="text" name="latitude[]" class="form-control"/><small id="latitude" class="form-text text-muted mb-4">\n' +
                        '        Enter Latitude value \n' +
                        ' </small></div></div>' +
                        ' <div class="col-md-5"><div class="form-group"><label for="longitude" class="bmd-label-floating">Longitude </label>' +
                        '<input id="latitude" type="text" name="longitude[]" class="form-control"/> <small id="longitude" class="form-text text-muted mb-4">\n' +
                        '            Enter longitude value \n' +
                        '   </small></div></div><div class="col-md-2 remove_field"><button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</button></div></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });

{{--</script>--}}

{{--<script>--}}

{{-- $(document).ready(function () {--}}
{{--            $('#coordinates').on('change', function () {--}}
{{--                var no_of_coordinates = $('#coordinates').val();--}}
{{--                if (no_of_coordinates == 3) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').hide();--}}
{{--                    $('#coordinates5').hide();--}}
{{--                    $('#coordinates6').hide();--}}
{{--                    $('#coordinates7').hide();--}}
{{--                    $('#coordinates8').hide();--}}
{{--                    $('#coordinates9').hide();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 4) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').hide();--}}
{{--                    $('#coordinates6').hide();--}}
{{--                    $('#coordinates7').hide();--}}
{{--                    $('#coordinates8').hide();--}}
{{--                    $('#coordinates9').hide();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 5) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').show();--}}
{{--                    $('#coordinates6').hide();--}}
{{--                    $('#coordinates7').hide();--}}
{{--                    $('#coordinates8').hide();--}}
{{--                    $('#coordinates9').hide();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 6) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').show();--}}
{{--                    $('#coordinates6').show();--}}
{{--                    $('#coordinates7').hide();--}}
{{--                    $('#coordinates8').hide();--}}
{{--                    $('#coordinates9').hide();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 7) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').show();--}}
{{--                    $('#coordinates6').show();--}}
{{--                    $('#coordinates7').show();--}}
{{--                    $('#coordinates8').hide();--}}
{{--                    $('#coordinates9').hide();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 8) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').show();--}}
{{--                    $('#coordinates6').show();--}}
{{--                    $('#coordinates7').show();--}}
{{--                    $('#coordinates8').show();--}}
{{--                    $('#coordinates9').hide();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 9) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').show();--}}
{{--                    $('#coordinates6').show();--}}
{{--                    $('#coordinates7').show();--}}
{{--                    $('#coordinates8').show();--}}
{{--                    $('#coordinates9').show();--}}
{{--                    $('#coordinates10').hide();--}}
{{--                }--}}
{{--                if (no_of_coordinates == 10) {--}}
{{--                    $('#coordinates3').show();--}}
{{--                    $('#coordinates4').show();--}}
{{--                    $('#coordinates5').show();--}}
{{--                    $('#coordinates6').show();--}}
{{--                    $('#coordinates7').show();--}}
{{--                    $('#coordinates8').show();--}}
{{--                    $('#coordinates9').show();--}}
{{--                    $('#coordinates10').show();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

        // Password showing script

        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        // $('.toggle-password').on('click', function() {
        //     $(this).toggleClass('fa-eye fa-eye-slash');
        //     let input = $($(this).attr('toggle'));
        //     if (input.attr('type') === 'password') {
        //         input.attr('type', 'text');
        //     }
        //     else {
        //         input.attr('type', 'password');
        //     }
        // });

    </script>

