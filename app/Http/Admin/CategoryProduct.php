<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }


    public function create(){
        return view('admin.cate_add', [
            'title'=>'Thêm danh mục mới',
            'categories'=>$this->categoryService->getParent(),
            'ur'=>''
        ]);
    }

    public function index(){
        return view('admin.cate_list', [
            'title'=>'Danh sách danh mục',
            'categories'=>$this->categoryService->getAll(),
            'ur'=>''
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

    public function show(Category $category){
        return view('admin.cate_edit', [
            'title'=>'Chỉnh sửa danh mục:  ' . $category->name,
            'category'=>$category,
            'categories'=>$this->categoryService->getParent(),
            'ur'=>'../'
        ]);
    }

    public function update(Category $category, CreateFormRequest $request){
        $this->categoryService->update($request, $category);
        return redirect('admin/cate_list');
    }

    public function destroy(Request $request): JsonResponse{
        $result = $this->categoryService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
