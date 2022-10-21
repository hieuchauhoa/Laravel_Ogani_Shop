@extends('admin.main')

@section('head')
    <script src="../{{$ur}}public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
    </div>
    <form action="" method="post">
        @csrf
        <div class="card-body">
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
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection

