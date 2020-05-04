@extends('Admin.layouts.base')

{{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
{{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div id="message">

                </div>
                <i class="card-title "></i>Product  Details
                <a class="btn btn-sm btn-primary" href="/admin/product/create" style="float: right; background-color:#00acc1" >Add Product</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th> ID </th>
                                <th> Image </th>
                                <th> Name </th>
                                <th> price (gms) </th>
                                <th> Quantity </th>
                                <th> Availability </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($products as $product)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="col-md-4">
                                            <img style="width: 100px; height:100px"
                                                 src="/storage/merchant/products/{{ $product->image }}"/>
                                        </div>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price}} ₹</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
{{--                                        @if($product->availability == 1)--}}
{{--                                            <button class="btn btn-sm btn-success" name="availability">Available</button>--}}
{{--                                        @else--}}
{{--                                            <button class="btn btn-sm btn-danger" name="availability">Not Available</button>--}}
{{--                                        @endif--}}

                                        <label>
                                            <input type="checkbox" data-toggle="toggle" class="toggle-class"
                                                   data-id="{{$product->id}}" data-on="Available" data-off="Not Available"
                                                {{$product->availability == true ? 'checked' : '' }}>
                                        </label>

                                    </td>

                                    <td>
                                        <div>
                                        <a class="btn btn-sm btn-primary" href="/admin/product/{{ $product->id }}/edit"
                                           style=" background-color:#fb8c00; ">Edit</a>
                                        <form action="/admin/product/{{$product->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                    style=" background-color: #e53935">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                            </tr>
                        </tbody>
                                @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        });
        $('.toggle-class').on('change',function () {
            var availability=$(this).prop('checked')==true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'{{route("change.status")}}',
                data:{'availability' : availability, 'id':id},
                success:function (data) {
                    $('#message').html('<p class="alert alert-danger">'+ data.success +'</p>');
                }
            });
        });
    </script>

@endsection
