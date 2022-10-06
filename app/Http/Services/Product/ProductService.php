<?php

namespace App\Http\Services\Product;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
    public function create($request){
       try{
            Category::create([
                'name' => (string) $request->input('name'),
                'cate_id' => (int) $request->input('cate_id'),
                'packet' => (string) $request->input('paket'),
                'review' => (string) $request->input('review'),
                'images' => (string) $request->input('images'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Tạo sản phẩm thành công');
       } catch (\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
       }
       return true;
    }

    public function getAll(){
        return Product::orderbyDesc('id', 0)->paginate(10);
    }
}