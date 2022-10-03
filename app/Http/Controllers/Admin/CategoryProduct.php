<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }


    public function create(){  
        return view('admin.cate_add', [
            'title'=>'Thêm danh mục mới',
            'categories'=>$this->categoryService->getParent()
        ]);
    }

    public function index(){
        return view('admin.cate_list', [
            'title'=>'Danh sách danh mục',
            'categories'=>$this->categoryService->getAll()
        ]);        
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
    public function store(CreateFormRequest $request){
        $result = $this->categoryService->create($request);
        return Redirect()->back();
        //dd($request->input());
    }
}
