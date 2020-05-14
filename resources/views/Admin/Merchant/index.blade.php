@extends('Admin.layouts.base')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <i class="card-title "></i>Merchant Details
                <a class="btn btn-sm btn-primary" href="/admin/merchant/create" style="float: right; background-color:#00acc1" >Add Merchant</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Shop Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($merchants as $merchant)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $merchant->name }}</td>
                                    <td>{{ $merchant->email}}</td>
                                    <td>{{ $merchant->contact_no }}</td>
                                    <td>{{ $merchant->shop_name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="/admin/merchant/{{ $merchant->id }}/edit"
                                           style=" background-color:#fb8c00">Edit</a>
                                        <form action="/admin/merchant/{{$merchant->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                    style=" background-color: #e53935">Delete</button>
                                        </form>
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
