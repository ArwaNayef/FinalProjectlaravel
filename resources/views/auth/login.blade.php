<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <title>Login</title>
</head>
<body class="bg-gray-200">

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://img.freepik.com/free-photo/black-friday-elements-assortment_23-2149074076.jpg?w=2000&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div style="background-color:saddlebrown; border-style: ridge">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">{{ __('Email Address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    onfocus="focused(this)" name="email">
                                </div>
                                @error('email')
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{$errors->first()}}</span>
                                </div>
                                @enderror
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control  @error('Password') is-invalid @enderror"
                                           onfocus="focused(this)"
                                           name="password">
                                </div>
                                @error('password')
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{$errors->first()}}</span>
                                </div>
                                @enderror
                                <div class="text-center">
                                    <button type="submit" style="background-color:saddlebrown; border-style: ridge">{{ __('Sign in') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@include('includes.script')
</body>
</html>
