@extends('admin.adminlayout')
@section('content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm mới
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{('save_product')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="packet">Phụ kiện</label>
                                    <textarea class="form-control" style="resize: none" rows="2" id="packet" name="packet" placeholder="Nhập phụ kiện đi kèm"></textarea>
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
                                    <textarea class="form-control" style="resize: none" rows="5" id="review" name="review" placeholder="Nhập mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="images">Hình ảnh</label>
                                    <input type="file" class="form-control" id="images" name="images" placeholder="Hình ảnh sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Kích hoạt</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                                        <lable for="active" class="custom-control-label">Có</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                                        <lable for="active" class="custom-control-label">Không</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>   
        </div>
    </div>
    <script>
        CKEDITOR.replace('review');
    </script>
@endsection