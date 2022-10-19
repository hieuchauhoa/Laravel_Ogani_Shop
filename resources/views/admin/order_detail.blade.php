@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Update</th>
            <th style="width:20px;"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($order_details as $key => $detail)
            <tr>
                <td>{{$detail->o_id}}</td>
                <td>{{$detail->pro_id}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->updated_at}}</td>
                <td>
                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow({{ $detail->id }}, 'order_detail_destroy')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
