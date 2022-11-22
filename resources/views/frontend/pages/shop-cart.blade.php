@extends('FrontEnd.layouts.master')
@section('main-content')

<!-- Hero Section Begin -->
<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul ng-repeat="cat in categories" ng-if="cat.parent_id==0">
                            <li>
                                <a href>@{{cat.name}}</a>
                                <li ng-repeat="cate in categories" ng-if="cate.parent_id==cat.id"><a href="/product?cateID=@{{cate.id}}" ng-click="cateID(cate.id)"> -- @{{cate.name}}</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="/product" method="get">
                                <input type="text" placeholder="What do you need?" ng-model="key" name="keyword">
                                <button type="submit" ng-click="keyword(key)" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/img/product/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $content= Cart::content();      
                                ?>
                                @foreach($content as $v_content)
                                <?php
                                     Cart::setTax($v_content->rowId, 0);
                                 ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{$v_content->options->image}}" alt="">
                                            <h5>{{$v_content->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                        {{number_format($v_content->price).'đ'}}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <form action="/updateQty" method="post" >
                                                {{ csrf_field() }}
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" name="quantity_cart" value="{{$v_content->qty}}">
                                                        <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}">
                                                    </div>
                                                    <button type="submit" name="update_qtyt" value="cập nhật" class="primary-btn">Upadate</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <?php
                                                $subtotal=$v_content->price*$v_content->qty;
                                                echo number_format($subtotal).'đ';
                                            ?>
                                        
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="/delete-to-cart/{{$v_content->rowId}}"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                 
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('product')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Tổng: <span>{{Cart::priceTotal().'đ'}}</span></li>
                            <li>Thuế: <span>{{Cart::tax().'đ'}}</span></li>
                            <li>Phí vận chuyển: <span>Free</span></li>
                            <li>Thành tiền:  <span>{{Cart::total().'đ'}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->


    

    @endsection