@extends('admin.main')

@section('content')
    <div class="container-fluid mt-3">
        <form action="enhanced-results.html">
            <div class="row">
                <div class="col-md-12 ml-3 mr-3">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-sm">
                                <input type="search" class="form-control form-control-sidebar" placeholder="Nhập tên sản phẩm cần tìm.." name="search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2">
                            <div class="form-group">
                                <select class="select2" style="width: 100%;">
                                    <option selected>Sort Order</option>
                                    <option>DESC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <select class="select2" style="width: 100%;">
                                    <option selected>Order By</option>
                                    <option>Date</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <select class="select2" style="width: 100%;">
                                    <option selected>Export</option>
                                    <option>Date</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-header mt-2">
        <h3 class="card-title">{{$title}}</h3>
    </div>
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
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="product_edit/{{ $product->id }}"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow( {{$product->id }}, 'product_destroy')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
