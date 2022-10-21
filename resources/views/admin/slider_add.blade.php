@extends('admin.main')

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
    </div>
    <form action="save_slider" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title" placeholder="Nhập tiêu đề">
            </div>
            <div class="form-group">
                <label for="">Thông tin</label>
                <textarea class="form-control" value="{{ old('full') }}" id="full" name="full" placeholder="Nhập thông tin"></textarea>
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
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm slider</button>
        </div>
    </form>
@endsection

