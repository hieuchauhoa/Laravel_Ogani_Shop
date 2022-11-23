@include('frontend.layouts.display')

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Quên mật khẩu</h3>
				
			</div>
			<div class="card-body">
				<form action="postpassword" method="POST" role="form">
					
				@if(Session::has('success')) 
					
                    <div class="alert alert-success">{!!Session::get('success')!!}</div>
                     @endif
                    @if(Session::has('fail')) 
                         <div class="alert alert-danger">{!!Session::get('fail')!!}</div>
                    @endif
                    @csrf
                    
                   
                    
					
					 <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" type="password">
        
    </div> <!-- form-group// -->
    <div class="form-group ">
        <span class="text-danger">@error('new_password'){{$message}} @enderror</span>
    
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="Repeat_password"class="form-control" placeholder="Nhập lại mật khẩu" type="password">
       
    </div> <!-- form-group// -->    
    <div class="form-group ">
        <span class="text-danger">@error('Reapeat_password'){{$message}} @enderror</span>
    
    </div>                
                             
					<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Đổi mật khẩu  </button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
