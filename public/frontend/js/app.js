var app= angular.module('app',[]);
app.controller('AppController', function($scope,$http){
    $http.get('http://localhost:8000/api/category').then(function(res){
        $scope.categories =res.data.result;
    $http.get('http://localhost:8000/api/product').then(function(res){
       $scope.products=res.data.result; 
    });
    });
});
