<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="g-sidenav-show  bg-gray-200">
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient"
    id="sidenav-main">
    @include('includes.sidebar')
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('includes.navbar')
    <div class="container-fluid py-4">
        @yield('content')
        <footer class="footer py-4  ">
        </footer>
    </div>
</main>
@include('includes.seeting')
<!--   Core JS Files   -->
@include('includes.script')
</body>

</html>
