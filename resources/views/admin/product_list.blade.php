@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Price sale</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->cate_id}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/product_edit/'.$product->id.'"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow({{$product->id}}, '/product_destroy')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
