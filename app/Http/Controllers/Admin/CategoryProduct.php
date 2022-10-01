<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add(){
        return view('admin.cate_add', ['title'=>'Trang thêm danh mục']);
    }

    public function all(){
        return view('admin.cate_all', ['title'=>'Danh sách danh mục']);        
    }
    public function save_category(Request $request){
        $data = array();
        $data['name'] = $request->catename;
        $data['slug'] = $request->desc;
        $data['parent_id'] = '0';
        DB::table('category')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công!');
        return Redirect('/admin/cate_add');
    }
}
