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
                                <a href>@{{cat.name}}</a>
                                
                                    <li ng-repeat="cate in categories" ng-if="cate.parent_id==cat.id"><a href="{{route('product')}}" ng-click="cateID(cate.id)"> -- @{{cate.name}}</a></li>
                                
                            </li>

                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('product')}}">
                                <input type="text" placeholder="What do you need?" ng-model="key">
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
                    <div class="hero__item set-bg" ng-repeat="banner in banners" ng-if="banner.name=='banner1'" ng-if="banner.status==1" data-setbg="@{{banner.url}}">
                        <div class="hero__text">
                            </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> 
                            <a href="{{route('product')}}" class="primary-btn">SHOP NOW</a>
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
                    <div class="col-lg-3" ng-repeat="cate in categories" ng-if="cate.parent_id!=0">
                        <div class="categories__item set-bg" data-setbg="@{{cate.img}}"  >
                            <h5><a href="#">@{{cate.name}}</a></h5>
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
                <div ng-repeat="pro in productsAll" class="col-lg-3 col-md-4 col-sm-6 mix category@{{pro.cate_id}}">
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
                    <div class="banner__pic" ng-repeat="banner in banners" ng-if="banner.name=='banner2'" ng-if="banner.status==1">
                        <img src="@{{banner.url}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic" ng-repeat="banner in banners" ng-if="banner.name=='banner3'" ng-if="banner.status==1">
                        <img src="@{{banner.url}}" alt="">
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
                            <div class="latest-prdouct__slider__item" ng-repeat="pro in productsLast">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[0].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[0].name}}</h6>
                                        <span>@{{pro[0].price}}đ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[1].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[1].name}}</h6>
                                        <span>@{{pro[1].price}}đ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[2].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[2].name}}</h6>
                                        <span>@{{pro[2].price}}đ</span>
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
                            <div class="latest-prdouct__slider__item" ng-repeat="pro in productsRate">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[0].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[0].name}}</h6>
                                        <span>@{{pro[0].price}}đ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[1].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[1].name}}</h6>
                                        <span>@{{pro[1].price}}đ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[2].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[2].name}}</h6>
                                        <span>@{{pro[2].price}}đ</span>
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
                            <div class="latest-prdouct__slider__item" ng-repeat="pro in productsReview">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[0].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[0].name}}</h6>
                                        <span>@{{pro[0].price}}đ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[1].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[1].name}}</h6>
                                        <span>@{{pro[1].price}}đ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="@{{pro[2].images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>@{{pro[2].name}}</h6>
                                        <span>@{{pro[2].price}}đ</span>
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