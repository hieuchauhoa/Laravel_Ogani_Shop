<!DOCTYPE html>
<html lang="en">
<head>
    @include('FrontEnd.layouts.head')
</head>
<body>
    @include('FrontEnd.layouts.header')
    @yield('main-content')
    @include('FrontEnd.layouts.footer')

</body>
</html>