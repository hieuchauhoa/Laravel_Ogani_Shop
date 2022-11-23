<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('web')->check()) {
            return redirect('showlogin')->with('fail','Vui lòng hãy đăng nhập');
        }
        elseif(Auth::guard('web')->user()->status==0){
            Auth::guard('web')->logout();
            return redirect('showlogin')->with('fail','tài khoản của bạn chưa được xác thực,vui lòng <a href="https://accounts.google.com/"> kích vào đây </a>');
        }
        return $next($request);
    }
}
