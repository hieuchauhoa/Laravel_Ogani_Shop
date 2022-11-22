@extends('FrontEnd.layouts.master')
@section('main-content')
<!-- Hero Section Begin -->
<section class="hero hero-normal" ng-init="getproduct()">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                   
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form >
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
    <section class="breadcrumb-section set-bg" data-setbg="img/product/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('index')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href ng-click="cateID('')">All</a></li>  
                            </ul>
                            <ul ng-repeat="cate in categories" ng-if="cate.parent_id!=0">
                                <li><a href ng-click="cateID(cate.id)">@{{cate.name}}</a></li>   
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="5000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white" ng-click="keyword('white')">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray" ng-click="keyword('gray')">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red" ng-click="keyword('red')">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black" ng-click="keyword('black')">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue" ng-click="keyword('blue')">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green" ng-click="keyword('green')">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Ram</h4>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    4GB
                                    <input type="radio" id="tiny" ng-click="keyword('4gb')">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    6GB
                                    <input type="radio" id="small" ng-click="keyword('6gb')">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    8GB
                                    <input type="radio" id="medium" ng-click="keyword('8gb')">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    12GB
                                    <input type="radio" id="large" ng-click="keyword('12gb')">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="exlarge">
                                    16GB
                                    <input type="radio" id="exlarge" ng-click="keyword('16gb')">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item" ng-repeat="pro in productsLast">
                                        <a href="/product-detail/@{{pro[0].id}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="@{{pro[0].images}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>@{{pro[0].name}}</h6>
                                                <span>@{{pro[0].price}}đ</span>
                                            </div>
                                        </a>
                                        <a href="/product-detail/@{{pro[1].id}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="@{{pro[1].images}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>@{{pro[1].name}}</h6>
                                                <span>@{{pro[1].price}}đ</span>
                                            </div>
                                        </a>
                                        <a href="/product-detail/@{{pro[2].id}}" class="latest-product__item">
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
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4" ng-repeat="pro in productsAll" ng-if="pro.price_sale!=null">
                                    <div class="product__discount__item">
                                        <form action="/saveCart" method="post" id="form_save_cart"+@{{pro.id}}>
                                            {{ csrf_field() }}
                                            <input name="productid_hidden" type="hidden" value="@{{pro.id}}">
                                            <input name="qty" type="hidden" value="1">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="@{{pro.images}}">
                                                <div class="product__discount__percent">@{{100-(pro.price_sale/pro.price*100)| number:0}}%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href onclick="document.getElementById('form_save_cart').submit()"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>Iphone</span>
                                                <h5><a href="/product-detail/@{{pro.id}}">@{{pro.name}}</a></h5>
                                                <div class="product__item__price">@{{pro.price}}đ <span>@{{pro.price_sale}}đ</span></div>
                                            </div>
                                        </form>                                      
                                    </div>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By: </span>
                                    <div class="sidebar__item__size">
                                        <label for="sort1">
                                            Default
                                            <input type="radio" id="sort1" ng-click="getSort('')">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__size">
                                        <label for="sort2">
                                            A-Z
                                            <input type="radio" id="sort2" ng-click="getSort('name')">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__size">
                                        <label for="sort3">
                                            Z-A
                                            <input type="radio" id="sort3" ng-click="getSort('name')">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4">
                                <div class="filter__found">
                                    <h6><span>@{{totalProduct}}</span> Products found - Page: <span>@{{currentPage}}</span>/<span>@{{totalPages}}</span></h6>
                                </div>
                            </div>                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6" ng-repeat="pro in products">
                            <div class="product__item">
                                <form action="/saveCart" method="post" id="form_save_cart">
                                    {{ csrf_field() }}
                                    <input name="productid_hidden" type="hidden" value="@{{pro.id}}">
                                    <input name="qty" type="hidden" value="1">
                                    <div class="product__item__pic set-bg" data-setbg="@{{pro.images}}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href onclick="document.getElementById('form_save_cart').submit()"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="/product-detail/@{{pro.id}}">@{{pro.name}}</a></h6>
                                        <h5>@{{pro.price}}đ</h5>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-push-4 product__pagination">
                            <posts-pagination class="text-center"></posts-pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    @endsection
