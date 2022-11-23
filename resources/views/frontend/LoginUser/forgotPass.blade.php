
@include('frontend.layouts.display')

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Quên mật khẩu</h3>
				
			</div>
			<div class="card-body">
				<form action="{{route('forgot-password')}}" method="POST" role="form">
					
				@if(Session::has('success')) 
					
                    <div class="alert alert-success">{!!Session::get('success')!!}</div>
                     @endif
                    @if(Session::has('fail')) 
                         <div class="alert alert-danger">{!!Session::get('fail')!!}</div>
                    @endif
				
                    @csrf
                    
                   
		    			<div class="input-group form-group">
                        <div class="form-group ">
                        <span class="text-white">Vui lòng nhập email bạn đã đăng ký tại cửa hàng Organi Shop</span>
                     </div>   
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Nhập email" >
						
					    </div>
                        @error('email')<span class="text-danger">{{$message}} </span>@enderror
					<button type="submit" class="btn btn-primary btn-block"> Gửi email để xác nhận   </button>
					
				</form>
			</div>
			
		</div>
	</div>
</div>
