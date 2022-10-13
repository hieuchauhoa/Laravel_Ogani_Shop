<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login1', [
            'title'=>'Đăng nhập hệ thống',
            'ur'=>''
        ]);
    }
    public function store(Request $request){
        //dd($request->input());
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password'=>$request->input('password'),
            'level'=>2
        ], $request->input('remember'))){
            $admin = Auth::user();
            Session::put('admin_name', $admin->name);
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc mật khẩu không chính xác !');
        return redirect()->back();
    }
}
