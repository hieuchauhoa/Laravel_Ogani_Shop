<?php

namespace App\Http\Services\Order;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class OrderService
{
    public function getAll()
    {
        return Order::with('user')->orderbyDesc('id', 0)->paginate(15);
        //return Order::orderbyDesc('id', '>', 100)->cursorPaginate(10);
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
            Order::create([
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
        $order = Order::where('id', $request->input('id'))->first();
        $order_detail = OrderDetail::where('o_id', $request->input('id'));
        if($order && $order_detail){
            $order->delete();
            $order_detail->delete();
            return true;
        }
        return false;
    }
}
