@extends('admin.main')

@section('head')
    <script src="../public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
    </div>
    <form action="save_product" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" class="form-control" value="{{ old('price') }}" id="price" name="price" placeholder="Nhập giá gốc của sản phẩm">
            </div>
            <div class="form-group">
                <label for="price_sale">Giá giảm</label>
                <input type="number" class="form-control" value="{{ old('price_sale') }}" id="price_sale" name="price_sale" placeholder="Nhập giá giảm của sản phẩm">
            </div>
            <div class="form-group">
                <label for="packet">Phụ kiện</label>
                <textarea class="form-control" value="{{ old('packet') }}" id="packet" name="packet" placeholder="Nhập phụ kiện đi kèm"></textarea>
            </div>
            <div class="form-group">
                <label for="cate_id">Danh mục</label>
                <select name="cate_id" id="cate_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="review">Mô tả sản phẩm</label>
                <textarea class="form-control" id="review" name="review">{{ old('name') }}</textarea>
            </div>
            <div class="form-group">
                <label for="upload">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="file" id="file">

            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
            <div class="form-group">
                        <label for="cpu">CPU</label>
                        <input type="text" class="form-control" value="{{ old('cpu') }}" id="cpu" name="cpu" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="ram">RAM</label>
                        <input type="text" class="form-control" value="{{ old('ram') }}" id="ram" name="ram" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="screen">Màn hình</label>
                        <input type="text" class="form-control" value="{{ old('screen') }}" id="screen" name="screen" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="storage">Bộ nhớ</label>
                        <input type="text" class="form-control" value="{{ old('storage') }}" id="storage" name="storage" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exten_memmory">Bộ nhớ mở rộng</label>
                        <input type="text" class="form-control" value="{{ old('exten_memmory') }}" id="exten_memmory" name="exten_memmory" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="cam1">Camera trước</label>
                        <input type="text" class="form-control" value="{{ old('cam1') }}" id="cam1" name="cam1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="cam2">Camera sau</label>
                        <input type="text" class="form-control" value="{{ old('cam2') }}" id="cam2" name="cam2" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="sim">Sim</label>
                        <input type="text" class="form-control" value="{{ old('sim') }}" id="sim" name="sim" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="connect">Kết nối mạng</label>
                        <input type="text" class="form-control" value="{{ old('connect') }}" id="connect" name="connect" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="pin">Dung lượng pin</label>
                        <input type="text" class="form-control" value="{{ old('pin') }}" id="pin" name="pin" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="os">Hệ điều hành</label>
                        <input type="text" class="form-control" value="{{ old('os') }}" id="os" name="os" placeholder="">
                    </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'review' );
    </script>
@endsection
