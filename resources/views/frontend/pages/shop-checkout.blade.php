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
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="/save-checkout-cus" method="post">
                {{ csrf_field() }}
                    <div class="row">
                        <form action="">
                            <div class="col-lg-6 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Name<span>*</span></p>
                                            <input type="text"  name="shipping_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" class="checkout__input__add" name="shipping_address">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text"  name="shipping_phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email</p>
                                            <input type="text"  name="shipping_mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Order notes</p>
                                    <input type="text"  name="shipping_note"
                                        placeholder="Notes about your order, e.g. special notes for delivery.">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="checkout__order">
                                    <h4>Your Order</h4>
                                    <?php 
                                        $content= Cart::content();      
                                    ?>
                                    <div class="checkout__order__products">Products <span>Total</span></div>
                                    <ul>
                                    @foreach($content as $v_content)
                                    <?php
                                        Cart::setTax($v_content->rowId, 0);
                                    ?>
                                        <li>{{$v_content->name}}<span>
                                                                        <?php
                                                                            $subtotal=$v_content->price*$v_content->qty;
                                                                            echo number_format($subtotal).'đ';
                                                                        ?>
                                                                </span></li>
                                    @endforeach
                                    </ul>
                                    <div class="checkout__order__subtotal">Subtotal <span>{{Cart::subtotal().'đ'}}</span></div>
                                    <div class="checkout__order__total">Total <span>{{Cart::total().'đ'}}</span></div>
                                    <!-- <div class="checkout__input__checkbox">
                                        <label for="acc-or">
                                            Create an account?
                                            <input type="checkbox" id="acc-or">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua.</p>
                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Check Payment
                                            <input type="checkbox" id="payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Paypal
                                            <input type="checkbox" id="paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                                    <button type="submit" value="gửi" name="sendorder" class="site-btn">PLACE ORDER</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection