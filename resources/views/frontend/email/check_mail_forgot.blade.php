<div style="width:600px;margin:0 auto">
	<div style="width:600px;margin:0 auto">
		
				
				
					
                    
					
					
					<h2> Xin chào {{$user->name}}   </h2>
					
                   <p> Email này dùng để lấy lại mật khẩu của bạn</p>
					<p> Vui lòng click vào link dưới đây để đặt lại mật khẩu </p>
                    <p> Chú ý : Mã xác nhận có giá trị hiệu lực 1 giờ </p>
					<p>
					<a href="{{route('getpassword',['user'=>$user->id,'token'=>$user->token])}}" 
					style="display:inline-block;background:green;color: #fff;padding: 7px 25px;font-weight:bold;">Đặt lại mật khẩu</a>
					</p>
                    
				
	</div>
	<h3>Người đặt hàng</h3>
</div>




