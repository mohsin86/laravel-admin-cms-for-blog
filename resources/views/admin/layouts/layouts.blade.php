<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
</head>
<body>

@include('admin.includes.header')

@include('admin.includes.sidebarMenu')


<!--main-container-part-->
<div id="content">
    @yield('content')
</div>

<!--end-main-container-part-->
@include('admin.includes.footer')

</body>
</html>
