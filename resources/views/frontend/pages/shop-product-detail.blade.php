@extends('FrontEnd.layouts.master')
@section('main-content')
<!-- Hero Section Begin -->
<section class="hero hero-normal" ng-init="getproductid({{$productID}})">
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
                                <input type="text" placeholder="What do yo u need?" ng-model="key">
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
                        <h2>Organi Product Detail</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('index')}}">Home</a>
                            <a href="{{route('product')}}">Product</a>
                            <span>Product Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="@{{productSingle.images}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="@{{productSingle.image2}}"
                                src="@{{productSingle.image2}}" alt="">
                            <img data-imgbigurl="@{{productSingle.image3}}"
                                src="@{{productSingle.image3}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>@{{productSingle.name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">@{{productSingle.price}}đ</div>
                        <p>@{{productSingle.r_intro}}</p>
                        <form action="/saveCart" method="post">
                            {{ csrf_field() }}
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input name="qty" type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <input name="productid_hidden" type="hidden" value="@{{productSingle.id}}">
                            <button type="submit" class="primary-btn">ADD TO CARD</button>
                            <!-- <a href="#" class="primary-btn">ADD TO CARD</a> -->
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                        
                        <ul>
                            <li><b>Tình Trạng: </b> <span ng-if="productSingle.active=='1'">Còn Hàng</span><span ng-if="productSingle.active!='1'">Hết hàng</span></li>
                            <li ng-if="productSingle.promo1"><b>Có hỗ trợ: </b> <span>@{{productSingle.promo1}}</span></li>
                            <li ng-if="productSingle.promo2"><b>Khuyến mãi: </b> <span>@{{productSingle.promo2}}</span></li>
                            <li ng-if="productSingle.promo3"><b>Phương án khác: </b> <span>@{{productSingle.promo3}}</span></li>
                            <li ng-if="productSingle.packet"><b>Kèm: </b> <span>@{{productSingle.packet}}</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <p>
                                        @{{productSingle.description}}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    
                                    <p>
                                        @{{productSingle.review}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6" ng-repeat="pro in productsRelated">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="@{{pro.images}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="/product-detail/@{{pro.id}}">@{{pro.name}}</a></h6>
                            <h5>@{{pro.price}}đ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
    @endsection