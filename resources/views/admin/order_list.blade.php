@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Quanty</th>
            <th>Total</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Type</th>
            <th>Status</th>
            <th>Update</th>
            <th>Detail</th>
            <th style="width:20px;"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->c_id}}</td>
                <td>{{$order->qty}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->type}}</td>
                <td>{!! \App\Helpers\Helper::active($order->status) !!}</td>
                <td>{{$order->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="order_detail/{{ $order->id }}">Chi tiết</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow({{ $order->id }}, 'order_destroy')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}s
@endsection
