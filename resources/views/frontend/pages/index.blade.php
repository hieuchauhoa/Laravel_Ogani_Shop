@extends('FrontEnd.layouts.master')
@section('main-content')
<!-- Hero Section Begin -->
<section class="hero">
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
                                <a href="#">@{{cat.name}}</a>
                                
                                    <li ng-repeat="cate in categories" ng-if="cate.parent_id==cat.id"><a href="#"> -- @{{cate.name}}</a></li>
                                
                            </li>

                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do you need?">
                                <button type="submit" class="site-btn">SEARCH</button>
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
                    <div class="hero__item set-bg" data-setbg="img/banner/shop_phone_banner.png ">
                        <div class="hero__text">
                            </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> 
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row" >
                <div  class="categories__slider owl-carousel" >
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="https://www.beeart.vn/uploads/file/images/blog/apple/bee_art_logo_apple_2%20copy.jpg"  >
                            <h5><a href="#">Apple</a></h5>
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="https://www.beeart.vn/uploads/file/images/blog/apple/bee_art_logo_apple_2%20copy.jpg"  >
                            <h5><a href="#">Apple</a></h5>
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="https://www.beeart.vn/uploads/file/images/blog/apple/bee_art_logo_apple_2%20copy.jpg"  >
                            <h5><a href="#">Apple</a></h5>
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="https://www.beeart.vn/uploads/file/images/blog/apple/bee_art_logo_apple_2%20copy.jpg"  >
                            <h5><a href="#">Apple</a></h5>
                        </div>
                    </div> 
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="https://www.beeart.vn/uploads/file/images/blog/apple/bee_art_logo_apple_2%20copy.jpg"  >
                            <h5><a href="#">Apple</a></h5>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul >
                            <li class="active" data-filter="*">All</li>
                            <li ng-repeat="cate in categories" ng-if="cate.parent_id!=0" data-filter=".category@{{cate.id}}">@{{cate.name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" >
                <div ng-repeat="pro in products" class="col-lg-3 col-md-4 col-sm-6 mix category@{{pro.cate_id}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="@{{pro.images}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">@{{pro.name}}</a></h6>
                            <h5>@{{pro.price}}đ</h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/269831/Xiaomi-redmi-note-11-black-600x600.jpeg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/269831/Xiaomi-redmi-note-11-black-600x600.jpeg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/269831/Xiaomi-redmi-note-11-black-600x600.jpeg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/269831/Xiaomi-redmi-note-11-black-600x600.jpeg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22 Utral</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/269831/Xiaomi-redmi-note-11-black-600x600.jpeg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/269831/Xiaomi-redmi-note-11-black-600x600.jpeg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Samsung S22</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    

    
    @endsection