<?php

namespace App\Http\Services\User;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserService
{

    public function get()
    {
        return User::orderbyDesc('id', '>', 100)->cursorPaginate(15);
    }

    public function insert($request){
        try {
            $request->except('_token');
            User::create([
                'name' => (string) $request->input('name'),
                'password' => (string) $request->input('password'),
                'email' => (string) $request->input('email'),
                'phone' => (int) $request->input('phone'),
                'address' => (string) $request->input('address'),
                'status' => (int) $request->input('status'),
                'level' => (int) $request->input('level')
            ]);
            Session::flash('success', 'Thêm tài khoản thành công');
        } catch (\Exception $err){
            Session::flash('error', 'Thêm tào khoản lỗi !');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($user, $request){
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Câp nhật tài khoản thành công');
        } catch (\Exception $err){
            Session::flash('error', 'Cập nhật tài khoản thất bại !');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $product = User::where('id', $request->input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
    public function count(){
        return User::query()->count();
    }
}
