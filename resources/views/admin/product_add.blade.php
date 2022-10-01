@extends('admin.adminlayout')
@section('admin_content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm mới
                        </header>
                        <?php
		                    $msg = Session::get('message');
		                    if($msg){
                                echo "<script type='text/javascript'>alert('$msg');</script>";
			                    Session::put('message', null);
		                    }
	                    ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{('save_category')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="product_name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="packet">Phụ kiện</label>
                                    <textarea class="form-control" style="resize: none" rows="2" id="packet" name="packet" placeholder="Nhập phụ kiện đi kèm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cate">Phân loại</label>
                                    <select name="cate" id="cate" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Thương hiệu</label>
                                    <select name="brand" id="brand" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Nội dung sản phẩm</label>
                                    <textarea class="form-control" style="resize: none" rows="4" id="slug" name="slug" placeholder="Nhập nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="review">Mô tả sản phẩm</label>
                                    <textarea class="form-control" style="resize: none" rows="5" id="review" name="review" placeholder="Nhập mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="product_img">Hình ảnh</label>
                                    <input type="file" class="form-control" id="product_img" name="product_img" placeholder="Hình ảnh sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="status">Hiển thị</label>
                                    <select name="status" id="status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>   
        </div>
    </div>
@endsection