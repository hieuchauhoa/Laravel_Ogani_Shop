@include('frontend.layouts.RegisterForm')
<div class="container">






<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form action="{{route('register')}}" method="post">
        @if(Session::has('success')) 
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail')) 
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" value="{{old('name')}}">
        
    </div> <!-- form-group// -->
    <div class="form-group ">
    <span class="text-danger">@error('name'){{$message}} @enderror</span>
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" value="{{old('email')}}">
        
    </div> <!-- form-group// -->
    <div class="form-group ">
        <span class="text-danger">@error('email'){{$message}} @enderror</span>
    
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-address-card"></i> </span>
		 </div>
        <input name="address" class="form-control" placeholder=" Address" type="text" value="{{old('address')}}">
        
    </div> <!-- form-group// -->
    <div class="form-group ">
        <span class="text-danger">@error('address'){{$message}} @enderror</span>
    
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
        
		
    	<input name="phone" class="form-control" placeholder="Phone number" type="text" value="{{old('phone')}}">
        <span class="text-danger">
           
    </div> <!-- form-group// -->
    <div class="form-group ">
        <span class="text-danger">@error('phone'){{$message}} @enderror</span>
    
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password">
        
    </div> <!-- form-group// -->
    <div class="form-group ">
        <span class="text-danger">@error('password'){{$message}} @enderror</span>
    
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="Repeat-password"class="form-control" placeholder="Repeat password" type="password">
       
    </div> <!-- form-group// -->    
    <div class="form-group ">
        <span class="text-danger">@error('password'){{$message}} @enderror</span>
    
    </div>                                  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="{{route('showlogin')}}">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

