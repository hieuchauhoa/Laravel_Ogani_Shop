<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\Slider\CreateFormRequest;
use App\Http\Services\Slider\SliderService;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
    protected $sliderService;
    protected $productService;

    public function __construct(SliderService $sliderService){
        $this->sliderService = $sliderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_list', [
            'title'=>'Danh sách sản phẩm: '. $this->productService->count(),
            'products'=>$this->productService->get(),
            'ur'=>''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider_add', [
            'title'=>'Thêm slider',
            'ur'=>''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request){
        $this->productService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product_edit', [
            'title'=>'Chỉnh sửa sản phẩm:  ' . $product->name,
            'product'=>$product,
            'categories'=>$this->categoryService->getParent(),
            'ur'=>'../'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, CreateFormRequest $request){
        $result = $this->productService->update($product, $request);
        if($result) return redirect('admin/product_list');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse{
        $result = $this->productService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
