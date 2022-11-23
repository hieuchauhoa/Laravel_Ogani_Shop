<div style="width:600px;margin:0 auto">
	<div style="width:600px;margin:0 auto">
		
				<!-- Error Inner -->
				
					
                    
					
					
					<h2> Xin chào {{$user->name}}   </h2>
					
                   <p> Bạn đã đăng ký tài khoản tại Organi shop</p>
					<p> Vui lòng xác thực email để tạo tài khoản </p>
					<p>
					<a href="{{route('vertified',['user'=>$user->id,'token'=>$user->token])}}" 
					style="display:inline-block;background:green;color: #fff;padding: 7px 25px;font-weight:bold;">Xác thực email</a>
					</p>
				<!--/ End Error Inner -->
		
	</div>
	<h3>Người đặt hàng</h3>
</div>




