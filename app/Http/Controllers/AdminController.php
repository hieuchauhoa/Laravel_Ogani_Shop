<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function adminlayout(){
        //return view('admin.adminlayout', ['title'=>'Trang quản lý']);
        return view('admin.home', ['title'=>'Trang quản lý']);
    }
    public function showdashboard(){
        return view('admin.dashboard', ['title'=>'Trang thống kê']);
    }
    public function index(){
        return view('admin.home', [
            'title'=>'Trang quản lý',
            'ur'=>''
        ]);
    }
    //Kiểm tra tài khoản admin
    public function log_in(Request $request){
        $admin_email = $request->email;
        $admin_password = md5($request->password);
        $result = DB::table('admin_users')->where('email', $admin_email)->where('password', $admin_password)->first();
        if($result){
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id);
            return Redirect::to('/admin/home');
        }else{
            Session::put('message', 'Email hoặc mật khẩu không chính xác!!!');
            return Redirect::to('/admin/login');;
        }
    }
    //Đăng xuất
    public function log_out(){
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin/login');
    }
}
