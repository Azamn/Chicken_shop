@extends('Admin.layouts.base')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
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
                                            <img style="width: 100px; height:100px" src="/storage/merchant/products/{{$product->image}}"></img>
                                        </div>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price}} ₹</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        @if($product->availability == 1)
                                            <button class="btn btn-sm btn-success" name="availability">Available</button>
                                        @else
                                            <button class="btn btn-sm btn-danger" name="availability">Not Available</button>
                                        @endif
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



@endsection
