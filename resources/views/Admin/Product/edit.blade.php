@extends('Admin.layouts.base')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Product</h4>

            </div>
            <div class="card-body">
                <form  method="post" action="{{ route('product.update' , $id) }}"
                       enctype="multipart/form-data" id="productCreateForm">

                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Name</label>
                                <p for="name" >{{ $product->name }}</p>
{{--                                <input id="name" type="text" name="name" value="{{$product->name}}" class="form-control" >--}}

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="price" for="price" class="bmd-label-floating">Price</label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control" >

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
                                <input id="quantity" type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" >

                                @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                @if( $product->availability == 1)--}}

{{--                                        <label>--}}
{{--                                            <input type="checkbox" name="availability"  checked data-toggle="toggle"--}}
{{--                                                   data-on="Available" data-off="Not Available" data-onstyle="success" data-offstyle="danger">--}}
{{--                                        </label>--}}


{{--                                @else--}}

{{--                                        <label>--}}
{{--                                            <input type="checkbox" name="availability"  checked data-toggle="toggle"--}}
{{--                                                   data-on="Available" data-off="Not Available" data-onstyle="success" data-offstyle="danger">--}}
{{--                                        </label>--}}
{{--                                 @endif--}}

                    </div>

                    <button type="submit" style=" float:right;background-color: #43a047" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

{{--    <script>--}}

{{--        $(function() {--}}
{{--            $('#toggle-button').bootstrapToggle({--}}
{{--                on: 'Available',--}}
{{--                off: 'Not Available',--}}
{{--            });--}}

{{--            --}}{{--$('.toggle-class').on('change',function () {--}}
{{--            --}}{{--    var availability = $(this).prop('checked') == true ? 1 : 0;--}}
{{--            --}}{{--    var product_id = $(this).data('id');--}}

{{--            --}}{{--    $.ajax({--}}

{{--            --}}{{--        type: "GET",--}}

{{--            --}}{{--        dataType: "json",--}}

{{--            --}}{{--        url: '{{route("/admin/products/")}}',--}}

{{--            --}}{{--        data: {'availability': availability, 'id': product_id},--}}

{{--            --}}{{--        success: function (data) {--}}

{{--            --}}{{--            console.log(data.success)--}}

{{--            --}}{{--        }--}}

{{--            --}}{{--    });--}}



{{--        })--}}

{{--    </script>--}}

@endsection
