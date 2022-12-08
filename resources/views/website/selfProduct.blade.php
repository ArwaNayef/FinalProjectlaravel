@extends('layouts.masterlayout')

@section('Headtitle')
    {{ __('Product') }}
@endsection
@section('content')
    <div class="card card-body blur shadow-blur mx-4 mx-md-5 mx-lg-10 mt-n8">
        <div class="section my-4 my-lg-5">
            <div class="container">
                <div class="row flex-row">
                    <div class="text-center mt-n5 z-index-1">
                        <div class="position-relative">
                            <div class="blur-shadow-avatar rounded-circle">
                                <img class="avatar avatar-xxl shadow-lg" src="{{$product->photo}}"
                                     alt=" Product Picture">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div>
                            <h3 class="mt-lg-0 mt-4">{{$product->name}}</h3>
                            <span class="text-warning badge badge-success">{{$product->store->name}}</span>
                            <h6 class="mb-0 mt-2">Price</h6>
                            @if ($product->flag=="base")
                                <h5>${{$product->base_price}}</h5>
                            @else
                                <h5>${{$product->discount_price}}</h5>
                            @endif
                            <div class="accordion" id="accordionProduct">
                                <div class="accordion-item mb-1">
                                    <h6 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-bottom font-weight-bold text-start"
                                                type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true"
                                                aria-controls="collapseOne">
                                            Description
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0"></i>
                                        </button>
                                    </h6>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne"
                                         data-bs-parent="#accordionProduct">
                                        <div class="accordion-body text-sm opacity-8">
                                            {{$product->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4 ms-auto">
                                    @if(session()->has($product->id.'Adeed To Cart'))
                                    <a class="disabled btn bg-gradient-warning mb-0 mt-lg-auto w-100" type="button"
                                            >Add to cart
                                    </a>
                                        @else
                                            <a href="{{ url('website/transaction/store',$product->id) }}" class="btn bg-gradient-warning mb-0 mt-lg-auto w-100" type="button"
                                               >Add to cart
                                            </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
