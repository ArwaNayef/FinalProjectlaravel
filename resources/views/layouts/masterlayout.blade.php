
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="g-sidenav-show  bg-gray-200">
<div class="container position-sticky z-index-sticky top-0">
    @include('includes.navbarwebsite')
</div>
<header class="header">
    @include('includes.headerwebsite')
</header>

        @yield('content')

<footer class="footer py-4  ">
    @include('includes.footer')
</footer>
<!--   Core JS Files   -->
@include('includes.script')
</body>

</html>
