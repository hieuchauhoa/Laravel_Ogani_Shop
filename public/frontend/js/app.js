var app= angular.module('app',[]);
app.controller('AppController', function($scope,$http){

  $scope.products = [];
  $scope.productSingle = [];
  $scope.productsAll = [];
  $scope.productsRelated = [];
  $scope.banners = [];
  $productsReview = [];
  $productsLast = [];
  $productsRate = [];
  $scope.totalPages = 0;
  $scope.currentPage = 1;
  $scope.range = [];
  $scope.totalProduct=0;
  $scope.key='';
  $scope.id='';
  $scope.sort='';

  $scope.keyword=function(key) {
    $scope.key=key;
    $scope.getproduct();
  };
  $scope.cateID=function(id) {
    $scope.id=id;
    $scope.getproduct();
  };
  $scope.getSort=function(sort) {
    $scope.sort=sort;
    $scope.getproduct();
  };

  $scope.getproductid = function (productid) {
    console.log("run");
    $http.get('http://localhost:8000/api/product/?productid='+productid).then(function(res){
          $scope.productSingle     = res.data.result;
          $scope.productSingleReview = res.data.result.review;
    });
  };




  // data list product of page
  $scope.getproduct = function (pageNumber) {
    console.log("run");
      if (pageNumber === undefined) {
          pageNumber = '1';
      }
      $http.get('http://localhost:8000/api/product/?page='+pageNumber+'&keyword='+$scope.key+'&cateID='+$scope.id+'&sort='+$scope.sort).then(function(res){
          $scope.products     = res.data.result.data;
          $scope.totalPages   = res.data.result.last_page;
          $scope.currentPage  = res.data.result.current_page;
          $scope.totalProduct  = res.data.result.total;
          // Pagination Range
          var pages = [];

          for (var i = 1; i <= res.data.result.last_page; i++) {
            pages.push(i);
          }
          $scope.range = pages;
      });
  };



    $http.get('http://localhost:8000/api/category').then(function(res){
        $scope.categories =res.data.result;
    });
    $http.get('http://localhost:8000/api/product').then(function(res){
       $scope.products=res.data.result; 
    });
    $http.get('http://localhost:8000/api/product-all').then(function(res){
       $scope.productsAll=res.data.result; 
    });
    $http.get('http://localhost:8000/api/banner').then(function(res){
       $scope.banners=res.data.result; 
    });
    $http.get('http://localhost:8000/api/product-last').then(function(res){
        productsLast=res.data.result; 
        var size = 3;
        $scope.productsLast = [];
        for (var i = 0; i < productsLast.length; i += size) {
          $scope.productsLast.push(productsLast.slice(i, i + size));
        }
    });
    $http.get('http://localhost:8000/api/product-rate').then(function(res){
      productsRate=res.data.result; 
      var size = 3;
      $scope.productsRate = [];
      for (var i = 0; i < productsRate.length; i += size) {
        $scope.productsRate.push(productsRate.slice(i, i + size));
      }
    });
    $http.get('http://localhost:8000/api/product-review').then(function(res){
      productsReview=res.data.result; 
      var size = 3;
      $scope.productsReview = [];
      for (var i = 0; i < productsReview.length; i += size) {
        $scope.productsReview.push(productsReview.slice(i, i + size));
      }
    });
    $http.get('http://localhost:8000/api/product-related').then(function(res){
        $scope.productsRelated=res.data.result; 
    });
    



});
// define directive pagination
app.directive('postsPagination', function(){
  return {
     restrict: 'E',
     template: '<ul class="pagination">'+
       '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getproduct(1)">«</a></li>'+
       '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getproduct(currentPage-1)"><i class="fa fa-long-arrow-left"></i></a></li>'+
       '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
           '<a href="javascript:void(0)" ng-click="getproduct(i)">{{ i }}</a>'+
       '</li>'+
       '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getproduct(currentPage+1)"><i class="fa fa-long-arrow-right"></i></a></li>'+
       '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getproduct(totalPages)">»</a></li>'+
     '</ul>'
  };
});

app.directive('productsinglereview', function(){
  return {
     restrict: 'E',
     template: 'productSingleReview'
  };
});