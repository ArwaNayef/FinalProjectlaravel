<!-- Navbar -->
<nav
    class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="collapse navbar-collapse container-fluid px-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link border-radius-lg"
                   href="#">
                    <div
                        class="text-center mx-3 mt-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('computer') }}</i>
                    </div>
{{--                    <span class="nav-link-text ms-1">{{ __('Website') }}</span>--}}
                </a>
            </li>
            <li class="nav-item mx-4">
                <div class="vr" style="height: 50px; width: .1px"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link border-radius-lg @if(Request::is('website/stores')) active text-white bg-gradient-warning @endif"
                   href="{{ route('website.stores') }}">
                    <div
                        class="text-center d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('store') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('Stores') }}</span>
                </a>
            </li>
            <li class="nav-item mx-4">
                <div class="vr" style="height: 50px; width: .1px"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link border-radius-lg @if(Request::is('website/products')) active text-white bg-gradient-warning @endif"
                   href="{{ route('website.products') }}">
                    <div
                        class="text-center d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">{{ __('category') }}</i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('Products') }}</span>
                </a>
            </li>
        </ul>
        <div class="nav-item align-items-center mt-3">
            @yield('search')
        </div>
        <div class="nav-item d-flex align-items-center">
{{--            <div class="vr mt-1" style="height: 55px; width: .1px"></div>--}}
            <a class="nav-link"
               href="{{ route('login') }}">
                <div class="text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">{{ __('login') }}</i>
                </div>
                <span class="nav-link-text ms-1">{{ __('Log In') }}</span>
            </a>
        </div>
    </div>
</nav>
