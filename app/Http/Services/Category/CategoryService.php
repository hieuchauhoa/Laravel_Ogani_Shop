<?php

namespace App\Http\Services\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryService
{
    public function create($request){
       try{
            Category::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Tạo danh mục thành công');
       } catch (\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
       }
       return true;
    }

    public function getParent(){
        return Category::where('parent_id', 0)->get();
    }

    public function getAll(){
        return Category::orderbyDesc('id', 0)->paginate(10);
    }
}