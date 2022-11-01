<!DOCTYPE html>
<html ng-app="app" ng-controller="AppController">
<head>
    @include('FrontEnd.layouts.head')
</head>
<body>
    @include('FrontEnd.layouts.header')
    @yield('main-content')
    @include('FrontEnd.layouts.footer')

</body>
</html>