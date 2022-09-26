<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login', ['title'=>'Đăng nhập hệ thống']);
    }
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')], $request->input('remember'))){

            return route('admin');
        }
        return redirect()->back();
    }
}
