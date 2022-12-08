<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">{{ __('Dashboard') }}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if(Request::is('/')) active bg-gradient-warning @endif"
                   href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('dashboard') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if(Request::is('stores')||Request::is('store/search')) active bg-gradient-warning @endif"
                   href="{{ route('stores') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('store') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('store') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if(Request::is('products')||Request::is('product/search')) active bg-gradient-warning @endif"
                   href="{{ route('products') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('category') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('Products') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if(Request::is('transactions')||Request::is('report')) active bg-gradient-warning @endif"
                   href="{{ route('transactions') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('receipt_long') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('Purchase Transactions') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if(Request::is('logout')) active bg-gradient-warning @endif"
                   href="{{ route('logout') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('logout') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('Log Out') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-warning mt-4 w-100" href="{{ route('website.stores') }}" type="button">{{ __('Go to Wibsite') }}</a>
        </div>
    </div>
</aside>
