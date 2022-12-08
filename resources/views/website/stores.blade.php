@extends('layouts.masterlayout')

@section('Headtitle')
    {{ __('Web Site') }}
@endsection

@section('search')
    <form class="form-inline" action="{{ URL('website/store/search') }}" method="get">
        <div class="input-group input-group-dynamic mb-3 border-radius-lg px-2 mx-3">
            <input type="search" placeholder="Search" name="search" class="form-control ">
            <div class="vr mt-2 ms-xl-2" style="height: 30px; width: 0.1px"></div>
            <div class="input-group-append pt-3 mx-1">
                <button class="text-warning btn-outline border-0 mb-0" type="submit" style="background-color:transparent">
                    <i class="material-icons opacity-10">{{ __('search') }}</i>
                </button>
                <a class="text-warning mb-0 "
                   href="{{ route('website.stores') }}">
                    <i class="material-icons opacity-10">{{ __('replay') }}</i>
                </a>
            </div>
        </div>
    </form>
@endsection

@section('content')
    <div
        class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n4 overflow-hidden position-relative z-index-2">
        <div class="container pb-5 position-relative z-index-3">
            <div class="row">
                @if(!count($stores)<1)
                    @foreach ($stores as $store )
                        <div class="col-md-4 mb-md-0 mb-7" style="margin-top: 10%;">
                            <div class="card">
                                <div class="text-center mt-n5 z-index-1">
                                    <div class="position-relative">
                                        <div class="blur-shadow-avatar rounded-circle">
                                            <img class="avatar avatar-xxl shadow-lg" src="{{$store->logo}}"
                                                 alt="Logo Store">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center pb-0">
                                    <h4 class="mb-0">{{$store->name}}</h4>
                                    <p>{{$store->phone}}</p>
                                    <p class="mt-2">
                                        {{$store->address}}
                                    </p>
                                </div>
                                <div class="card-footer text-center pt-2">
                                    <div class="mx-auto">
                                        <a class="btn bg-gradient-warning mt-4 w-100"
                                           href="{{ url('website/store/products',$store->id) }}"
                                           type="button">{{ __('Show Products of Store') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2 colspan="9" class="text-center">{{ __('No Stores') }}</h2>
                @endif
            </div>
        </div>
        <div class="pagination justify-content-center">
            {{ $stores->links() }}
        </div>
    </div>
@endsection

@section('script')

@endsection
