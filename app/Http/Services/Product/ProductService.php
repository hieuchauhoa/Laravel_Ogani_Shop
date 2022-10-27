<?php

namespace App\Http\Services\Product;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
    public function create($request){
       try{
            Product::create([
                'name' => (string) $request->input('name'),
                'price' => (int) $request->input('price'),
                'price_sale' => (int) $request->input('price_sale'),
                'cate_id' => (int) $request->input('cate_id'),
                'packet' => (string) $request->input('packet'),
                'review' => (string) $request->input('review'),
                'images' => (string) $request->input('file'),
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

    public function get()
    {
        return Product::with('category')->orderbyDesc('id', 0)->cursorPaginate(15);
        //return Product::orderbyDesc('id', '>', 100)->cursorPaginate(15);
    }

    protected function isValidPrice($request){
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
        && $request->input('price_sale') >= $request->input('price')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc của sản phẩm !');
            return false;
        }

        if ((int)$request->input('price') == 0 && $request->input('price_sale') != 0){
            Session::flash('error', 'Vui lòng nhập giá gốc !');
            return false;
        }
        return true;
    }

    public function insert($request){
        $isValidPrice = $this->isValidPrice($request);
        if (!$isValidPrice) return false;
        //dd($request->all());
        try {
            $request->except('_token');
            Product::create([
                'name' => (string) $request->input('name'),
                'price' => (int) $request->input('price'),
                'price_sale' => (int) $request->input('price_sale'),
                'cate_id' => (int) $request->input('cate_id'),
                'packet' => (string) $request->input('packet'),
                'review' => (string) $request->input('review'),
                'images' => (string) $request->input('file'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);

            $id = Product::where('name', $request->input('name'))->first()->id;

            ProductDetail::create([
                'cpu' => (string) $request->input('cpu'),
                'ram' => (string) $request->input('ram'),
                'screen' => (string) $request->input('screen'),
                'storage' => (string) $request->input('storage'),
                'exten_memmory' => (string) $request->input('exten_memmory'),
                'cam1' => (string) $request->input('cam1'),
                'cam2' => (string) $request->input('cam2'),
                'sim' => (string) $request->input('sim'),
                'connect' => (string) $request->input('connect'),
                'pin' => (string) $request->input('pin'),
                'os' => (string) $request->input('os'),
                'note' => (string) $request->input('review'),
                'pro_id' => (int) $id
            ]);

            Session::flash('success', 'Tạo sản phẩm thành công');
        } catch (\Exception $err){
            Session::flash('error', 'Thêm sản phẩm lỗi !');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($product, $request){
        $isValidPrice = $this->isValidPrice($request);
        if (!$isValidPrice) return false;
        //dd($request->all());
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Câp nhật sản phẩm thành công');
        } catch (\Exception $err){
            Session::flash('error', 'Cập nhật sản phẩm thất bại !');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $product = Product::where('id', $request->input('id'))->first();
        $productdetail = ProductDetail::where('pro_id', $request->input('id'))->get();
        if($product && $productdetail){
            $product->delete();
            $productdetail->delete();
            return true;
        }
        return false;
    }
    public function count(){
        return Product::query()->count();
    }
}
