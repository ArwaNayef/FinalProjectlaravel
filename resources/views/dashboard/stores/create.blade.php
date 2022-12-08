@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('Create Stores') }}
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="card mt-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('New Store') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 border-radius-lg ">
                @if(session()->has('status'))
                    @if(session()->get('status') == true)
                        <span class="alert alert-link text-success text-sm mb-3">* {{__('Added Successfully')}}</span>
                    @endif
                @endif
                <form role="form" class="text-start" method="POST" action="{{ route('store.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-static my-3">
                        <label>{{ __('Store Name') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="name">
                    </div>
                    <div class="input-group input-group-static mb-3">
                        <label>{{ __('Address') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="address">
                    </div>
                    <div class="input-group input-group-static mb-3">
                        <label>{{ __('Phone Number') }}</label>
                        {{--                        <label class="form-label">{{ __('Phone Number') }}</label>--}}
                        <input type="text" class="form-control orm-control"
                               name="phone">
                    </div>
                    {{--                    <h6><i class="material-icons opacity-10">{{ __('add_photo_alternate') }}</i> Upload a Profile photo...</h6>--}}
                    <div class="input-group input-group-static mb-3">
                        <label>{{ __('Logo') }}</label>
                        <input type="file" class="form-control orm-control"
                               name="logo" id="logo">
                        <label class="input-group-text"><i
                                class="material-icons opacity-10">{{ __('add_photo_alternate') }}</i></label>
                    </div>
                    @foreach ($errors->all() as $message)
                        <span class="alert alert-link text-danger text-sm">* {{ $message }}</span>
                    @endforeach
                    <div class="text-center">
                        <button type="submit" onclick="return confirm('Are You Sure To Create ??')"
                                class="btn bg-gradient-warning w-100 my-4 mb-2">{{ __('Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
