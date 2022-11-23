@include('frontend.layouts.display')

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng nhập</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="{{route('loginUser')}}" method="POST">
					
                    @if(Session::has('success')) 
					
                    <div class="alert alert-success">{!!Session::get('success')!!}</div>
                     @endif
                    @if(Session::has('fail')) 
                         <div class="alert alert-danger">{!!Session::get('fail')!!}</div>
                    @endif
				
                    @csrf
                    
                   
		    			<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Nhập email" @if(Cookie::has('email_user')) value="{{(Cookie::get('email_user'))}}" @endif>
						
					</div>
                    <div class="form-group ">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                     </div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" @if(Cookie::has('password_user')) value="{{(Cookie::get('password_user'))}}" @endif>
					</div>
                    <div class="form-group ">
                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                     </div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="rememberme" @if(Cookie::has('email_user')) checked @endif>Ghi nhớ đăng nhập
					</div>
					<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Đăng nhập  </button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Bạn chưa có tài khoản ?<a href="{{route('ShowRegister')}}">Đăng ký</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="{{route('forgot-password')}}">Quên mật khẩu?</a>
				</div>
			</div>
		</div>
	</div>
</div>
