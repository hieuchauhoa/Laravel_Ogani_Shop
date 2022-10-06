@extends('admin.adminlayout')
@section('content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm danh mục mới
                    </header>
                    <div class="card-body">
                        <div class="position-center">
                            <form role="form" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name" placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Danh mục cha</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="0"  {{$category->parent_id == 0 ? 'selected' : '' }}>Không có</option>
                                        @foreach($categories as $categoryParent)
                                            <option value="{{$categoryParent->id}}"
                                                {{$category->parent_id == $categoryParent->id ? 'selected' : '' }}>
                                                {{$categoryParent->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Mô tả danh mục">{{$category->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kích hoạt</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                                        {{$category->active == 1 ? 'checked==""' : ''}}>
                                        <label for="active" class="custom-control-label">Có</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="0" type="radio" id="active" name="active"
                                            {{$category->active == 0 ? 'checked==""' : ''}}>
                                        <label for="active" class="custom-control-label">Không</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
