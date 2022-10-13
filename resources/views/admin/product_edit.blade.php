@extends('admin.main')

@section('head')
    <script src="../{{$ur}}public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" class="form-control" value="{{ $product->price }}" id="price" name="price" placeholder="Nhập giá gốc của sản phẩm">
            </div>
            <div class="form-group">
                <label for="price_sale">Giá giảm</label>
                <input type="number" class="form-control" value="{{ $product->price_sale }}" id="price_sale" name="price_sale" placeholder="Nhập giá giảm của sản phẩm">
            </div>
            <div class="form-group">
                <label for="packet">Phụ kiện</label>
                <textarea class="form-control" value="{{ $product->packet }}" id="packet" name="packet" placeholder="Nhập phụ kiện đi kèm"></textarea>
            </div>
            <div class="form-group">
                <label for="cate_id">Danh mục</label>
                <select name="cate_id" id="cate_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ $product->cate_id == $category->id ? 'selected' : '' }}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="review">Mô tả sản phẩm</label>
                <textarea class="form-control" id="review" name="review">{{ $product->review }}</textarea>
            </div>
            <div class="form-group">
                <label for="upload">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="" target="_blank">
                        <img src="../{{$ur}}{{ $product->images }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="file" id="file" value="{{ $product->images }}">

            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$category->active == 1 ? 'checked=""' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$category->active == 0 ? 'checked=""' : ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'review' );
    </script>
@endsection
