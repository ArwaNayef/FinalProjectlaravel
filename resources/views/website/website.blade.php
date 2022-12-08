@extends('layouts.masterlayout')

@section('Headtitle')
    {{ __('Web Site') }}
@endsection
@section('content')
    <div
        class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n4 overflow-hidden position-relative z-index-2">
        <div class="container pt-6 pb-5 position-relative z-index-3">
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
                                           href="{{ route('website.products',$store->id) }}"
                                           type="button">{{ __('Show Products') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
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
