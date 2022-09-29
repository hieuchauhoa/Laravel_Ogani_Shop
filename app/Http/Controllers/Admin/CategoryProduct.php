<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    public function add(){
        return view('admin.cate_add', ['title'=>'Trang thêm danh mục']);
    }

    public function all(){
        return view('admin.cate_all', ['title'=>'Trang danh mục']);        
    }
}
