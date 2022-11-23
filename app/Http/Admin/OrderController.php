<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Order\OrderDetailService;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Services\Order\OrderService;
use App\Http\Requests;


class OrderController extends Controller
{
    protected $orderService;
    protected $orderDetailService;

    public function __construct(OrderService $orderService, OrderDetailService $orderDetailService){
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order_list', [
            'title'=>'Danh sách đơn hàng',
            'orders'=>$this->orderService->getAll(),
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order_detail', [
            'title'=>'Chi tiết hóa đơn:  ' . $order->id,
            'order_details'=>$this->orderDetailService->get($order->id),
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
    public function update(){
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse{
        $result = $this->orderService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa đơn hàng thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
