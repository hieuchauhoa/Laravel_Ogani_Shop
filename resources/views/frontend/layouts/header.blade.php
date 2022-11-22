<?php 
use Illuminate\Support\Facades\Session;
?>
<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('index') }}"><img src="/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>{{Cart::total().'đ'}}</span></div>
        </div>
        <div class="humberger__menu__widget">
            
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li  ><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('product') }}">Shop</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hieu@hieu.com</li>
                <li>Free Shipping for all Order</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hieu@hieu.com</li>
                                <li>Free Shipping for all Order</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            
                            <div class="header__top__right__auth">
                           


                             @if(Session::get('name'))
                                <div class="btn-group">
                                  
                                <button type="button" onclick="dropdown()" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                 {{
                                    Session::get('name')
                                    
                                 }}      

                                    
                                  
                                
                                </button>
                             
                               
                                <div class="dropdown-menu" id="dropdown-menu" >
                                    <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                                
                                    <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                                </div>
                                </div>
                                <script >
                                    function dropdown(){
                                        var menu = document.getElementById('dropdown-menu');   
                                        if(menu.style.display=='block'){
                                            menu.style.display='none';

                                        }else{
                                            menu.style.display='block';
                                        }
                                    }
                                </script>
                               
                             @endif 
                            @empty(Session::get('name'))   
                                <a href="{{route('showlogin')}}"><i class="fa fa-user"></i> 
                            

                            
                              Đăng nhập

                            

                                
                                </a>
                             @endempty   
                               
                             
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('index') }}"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li  ><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('product') }}">Shop</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>{{Cart::total().'đ'}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    