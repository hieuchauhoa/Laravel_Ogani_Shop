<?php

namespace App\Http\Services\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class OrderDetailService
{
    public function get($request){
        return OrderDetail::with('product')->where('o_id', $request)->get();
    }
}
