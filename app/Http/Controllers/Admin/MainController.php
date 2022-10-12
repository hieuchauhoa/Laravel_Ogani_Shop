<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class MainController extends Controller
{
    public function index(){
        return view('admin.home', [
            'title'=>'Trang quản lý',
            'ur'=>''
        ]);
    }
}
