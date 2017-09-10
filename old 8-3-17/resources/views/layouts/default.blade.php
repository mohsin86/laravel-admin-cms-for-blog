<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
<!--
    ==================================================
    Header Section Start
    ================================================== -->
<header id="top-bar" class="navbar-fixed-top animated-header">

    @include('includes.header')

</header>

@yield('content')

<!--
            ==================================================
            Footer Section Start
            ================================================== -->
<footer id="footer">
    @include('includes.footer')
</footer>

</body>
</html>
