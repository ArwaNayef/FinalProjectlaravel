@extends('layouts.masterlayout')

@section('Headtitle')
    {{ __('Web Site') }}
@endsection

@if(Request::is('website/products'))
    @section('search')
        <form class="form-inline" action="{{ URL('website/product/search') }}" method="get">
            <div class="input-group input-group-dynamic mb-3 border-radius-lg px-2 mx-3">
                <input type="search" placeholder="Search" name="search" class="form-control ">
                <div class="vr mt-2 ms-xl-2" style="height: 30px; width: 0.1px"></div>
                <div class="input-group-append pt-3 mx-1">
                    <button class="text-warning border-0 mb-0" type="submit" style="background-color:transparent">
                        <i class="material-icons opacity-10">{{ __('search') }}</i>
                    </button>
                    <a class="text-warning mb-0"
                       href="{{ url('website/products') }}">
                        <i class="material-icons opacity-10">{{ __('replay') }}</i>
                    </a>
                </div>
            </div>
        </form>
    @endsection
@endif

@section('content')
    <div
        class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n4 overflow-hidden position-relative z-index-2">
        <div class="container pb-5 position-relative z-index-3">
            <div class="row">
                @if(!count($products)<1)
                    @foreach ($products as $product )
                        <div class="col-6 col-lg-3" style="margin-top: 8%;">
                            <div class="card">
                                <div class="text-center mt-n5 z-index-1">
                                    <div class="position-relative">
                                        <div class="blur-shadow-avatar rounded-circle">
                                            <img class="avatar avatar-xxl shadow-lg" src="{{$product->photo}}"
                                                 alt=" Product Picture">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body text-center">
                                    <p class="mb-0 text-dark text-uppercase font-weight-normal text-sm">{{$product->store->name}}</p>
                                    <h5 class="font-weight-bold mt-3">
                                        <a href="{{ url('website/product/show',$product->id) }}">{{$product->name}}</a>
                                    </h5>
                                    <p class="mb-0 mycard">
                                        {{$product->description}}
                                    </p>
                                </div>
                                <div class="card-footer d-flex pt-0">
                                    @if ($product->flag=="base")
                                        <p class="font-weight-normal my-auto">${{$product->base_price}}</p>
                                    @else
                                        <p class="font-weight-normal my-auto">${{$product->discount_price}}</p>
                                    @endif
                                    @if(session()->has($product->id.'Adeed To Cart'))
                                        <a class="disabled position-relative ms-auto text-warning text-lg me-1 my-auto opacity-10">
                                            <i class=" material-icons"
                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                               title="Add to Cart">{{ __('shopping_cart') }}</i>
                                        </a>
                                    @else
                                        <a class="position-relative ms-auto text-lg me-1 my-auto opacity-10">
                                            <i href="{{ url('website/transaction/store',$product->id) }}"
                                               class="material-icons"
                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                               title="Add to Cart">{{ __('shopping_cart') }}</i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2 colspan="9" class="text-center">{{ __('No Products') }}</h2>
                @endif
            </div>
        </div>
        <div class="pagination justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection

@section('script')

@endsection
