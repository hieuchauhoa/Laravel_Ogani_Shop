<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->keyword){
            //console.log($request->keyword);
            if($request->sort){
                $prod =Product::where('slug','like','%'.$request->keyword.'%')  
                ->orWhere('name','like','%'.$request->keyword.'%')
                ->orderBy($request->sort)
                ->paginate(6);
            }
            else{
                $prod =Product::where('slug','like','%'.$request->keyword.'%')  
                ->orWhere('name','like','%'.$request->keyword.'%')
                ->paginate(6);
            }
            
        }
        else if($request->cateID){
            if($request->sort){
                $prod =Product::where('cate_id',$request->cateID)->orderBy($request->sort)->paginate(6);
            }
            else{
                $prod =Product::where('cate_id',$request->cateID)->paginate(6);
            }
        }
        else{
            if($request->sort){
                $prod =Product::orderBy($request->sort)->paginate(6);
            }
            else{
                $prod =Product::paginate(6);
            }
            
        }
        if($request->productid){
            $prod =Product::find($request->productid);
        }
        if($prod){
            return response()->json([
                'result' => $prod,
                'message' => 'ok'
            ],200);
        }
        return response()->json([
            'data' => null,
            'status_code' => 404,
            'message' => 'Data Not Found'
        ]);
        
        
    }
    public function index_all()
    {
        $prod =Product::All();
        return response([
            'result' => $prod,
            'message' => 'ok'
        ],200);
    }
    
    

    // public function search($string)
    // {
    //     $prod =Product::where("slug","like","%".$string."%")->get();
    //     if($prod){
    //         return response([
    //             'result' => $prod,
    //             'message' => 'ok'
    //         ],200);
    //     }
    //     return response()->json([
    //         'data' => null,
    //         'status_code' => 404,
    //         'message' => 'Data Not Found'
    //     ]);
    // }

    public function lastProduct()
    {
        $prod =Product::latest()->take(6)->get();
        if($prod){
            return response([
                'result' => $prod,
                'message' => 'ok'
            ],200);
        }
        return response()->json([
            'data' => null,
            'status_code' => 404,
            'message' => 'Data Not Found'
        ]);
    }
    public function rateProduct()
    {
            $prod =Product::inRandomOrder()->take(9)->get();
            if($prod){
                return response([
                    'result' => $prod,
                    'message' => 'ok'
                ],200);
            }
            return response()->json([
                'data' => null,
                'status_code' => 404,
                'message' => 'Data Not Found'
            ]);
    }
    public function reviewProduct()
    {
            $prod =Product::inRandomOrder()->take(6)->get();
            if($prod){
                return response([
                    'result' => $prod,
                    'message' => 'ok'
                ],200);
            }
            return response()->json([
                'data' => null,
                'status_code' => 404,
                'message' => 'Data Not Found'
            ]);
    }
    public function relatedProduct()
    {
            $prod =Product::inRandomOrder()->take(4)->get();
            if($prod){
                return response([
                    'result' => $prod,
                    'message' => 'ok'
                ],200);
            }
            return response()->json([
                'data' => null,
                'status_code' => 404,
                'message' => 'Data Not Found'
            ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
