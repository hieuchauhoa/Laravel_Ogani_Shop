<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class UserControllerFE extends Controller
{
    public function showRegister(){

        return view('frontend.LoginUser.Register');
    }
    public function showLogin(){

        return view('frontend.LoginUser.LoginUser');
    }
    public function Login(Request $request){

        $validation=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:32',
           
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'email.email'=>'Email phải chứa @',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Mật khẩu quá yếu tối thiểu 6 ký tự',
            'password.max'=>'Cho phép tối đa 32 kí tự ',
        ]);

        $user = User::where('email', '=',$request->email)->first();
        if ($user) {
        //    Hash::check( $request->password,$user->password )
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                 $request->session()->put('LoginID',$user->id);
                 if($request->has('rememberme')){
                    Cookie::queue('email_user',$request->email,1440);
                    Cookie::queue('password_user',$request->password,1440);
                 }
                 return redirect('/home');
                 
            }else{
                return back()->with('fail','Tài khoản hoặc mật khẩu không chính xác');

            }
        }
        else{
            return back()->with('fail','Đăng nhập không thành công,vui lòng kiểm tra');
        }
    }
    
    public function register(Request $request){
       
        $validation=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'phone'=>'required|numeric',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->status=1;
        $user->level=1;
        $user->password=bcrypt($request->password);

        $res=$user->save();

        if ($res) {
            
            return redirect('/showlogin')->with('success','Đăng ký thành công');
        }
        else{
            return back()->with('fail','Đăng ký không thành công,vui lòng kiểm tra');
        }
    }

//     public function header(Request $request){

//         $data=[];
//         if(Session::has('LoginID')){
//             $data=User::where('id','=',Session::get('LoginID'))->first();
            
//         }
//         else{
//             $data=null;
//         }       
        
//     return view('frontend.layout.index')
// }
    public function Dashboard(Request $request){

        $data=[];
        if(Session::has('LoginID')){
            $data=User::where('id','=',Session::get('LoginID'))->first();
            session()->put('name',$data->name);
            
           
        }
        else{
            session()->put('name',null);
            session()->put('login','đăng nhập');
           
            
        }   
        
            
        return view('frontend.pages.index');
    }
    
    
    public function logout(Request $request){
        if(Session::has('LoginID')){

            Session::pull('LoginID');
            Session::pull('name');

            return redirect('showlogin');
        }
    }
}
