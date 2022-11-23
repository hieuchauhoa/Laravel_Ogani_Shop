<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        // if(Auth::guard('web')->user()->status==0){
        //     Auth::guard('web')->logout();
        //     return redirect('showlogin')->with('fail','tài khoản của bạn chưa được kích hoạt');
        // }
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
    public function vertified(User $user,$token){
        if($user->token===$token){
            $user->update(['status'=>1,'token'=> null]);
            return redirect('/showlogin')->with('success','Tài khoản đã được xác thực, có thể đăng nhập');
        }else{
            return redirect('/showlogin')->with('fail','Mã xác nhận bạn gửi không hợp lệ');
        }

    }
    public function register(Request $request){
        
       
        $validation=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'phone'=>'required|numeric',
        ]);
        $token = strtoupper(Str::random(10));
        // $registerEmail=$request->input('email');
        // $user=new User();
        // $user->name=$request->name;
        // $user->phone=$request->phone;
        // $user->email=$request->email;
        // $user->address=$request->address;
        // $user->status=1;
        // $user->level=1;
        // $user->token=$token;
        // $user->password=bcrypt($request->password);
        
        //  $res=$user->save();
        $data=$request->only('name','phone','email','address','status','level','token','password');
        $password_h=bcrypt($request->password);
        $data['password']=$password_h;
        $data['token']=$token;
        $data['level']=1;
        $data['status']=0;
        

        if ($user=User::create($data)){
            
            Mail::send('frontend.email.send_mail',compact('user'),function($email) use($user) {
             $email->subject('Vertified Organi shop');
             $email->to($user->email,$user->name);
            });     
            
            return redirect('/showlogin')->with('success','Đăng ký thành công,Vui lòng xác thực email để đăng nhập');
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
        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
            Session::pull('LoginID');
            Session::pull('name');

            return redirect('/showlogin');
        }
        // if(Session::has('LoginID')){

        //     Session::pull('LoginID');
        //     Session::pull('name');

        //     return redirect('showlogin');
        // }
    }
    public function show_forgot_password(){
       return view('frontend.LoginUser.forgotPass');
    }

    public function forgot_password(Request $request){
        $validation=$request->validate([
            
            'email'=>'required|email|exists:users',
            
        ],[
            
            'email.required'=>'Vui lòng nhập email hợp lệ',
            'email.email'=>'Email phải chứa @',
            'email.exists'=>'Email không tồn tại'
            
        ]);

        $token = strtoupper(Str::random(10));
        
        $user=User::where('email',$request->email)->first();
        $user->update(['token'=>$token]);
            Mail::send('frontend.email.check_mail_forgot',compact('user'),function($email) use($user) {
                $email->subject('Organi shop -Lấy lại mật khẩu');
                $email->to($user->email,$user->name);
               });        
               return redirect()->back()->with('success','Vui lòng check mail để thay đổi mật khẩu');
     }

     public function get_password(User $user,$token){
      if($user->token===$token){

        return view('frontend.LoginUser.getPass');
      }
      return abort(404);
    }

    public function post_password(User $user,$token,Request $request){
        $validation=$request->validate([
            
            'new_password'=>'required|min:6|max:32',
            'Repeat_password'=>'required|min:6|max:32|same:new_password',
           
        ],[
            'Repeat_password.required'=>'Bạn chưa nhập Password',
            'Repeat_password.min'=>'Mật khẩu quá yếu tối thiểu 6 ký tự',
            'Repeat_password.max'=>'Cho phép tối đa 32 kí tự ',
            'Repeat_password.same'=>'Mật khẩu bạn nhập không trùng khớp ',
            'new_password.required'=>'Bạn chưa nhập Password',
            'new_password.min'=>'Mật khẩu quá yếu tối thiểu 6 ký tự',
            'new_password.max'=>'Cho phép tối đa 32 kí tự ',
            
        ]);
        
        
        $password_h=bcrypt($request->new_password);
        $user->update(['password'=> $password_h,'token'=> null]);
        return redirect('showlogin')->with('success','Mật khẩu của bạn đã được thay đổi , có thể đăng nhập');
        
        
      }
  
    public function send_mail(){
        $name='Organi Shop';
       Mail::send('frontend.email.send_mail',compact('name'),function($email) use($name){
        $email->subject('Apply Organi shop');
        $email->to('quanlycuahangdienthoai0123@gmail.com','Trí đẹp trai');
       });
    }
}
