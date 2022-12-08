@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('Create Products') }}
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="card mt-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('Create Product') }}</h6>
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
                <form role="form" class="text-start" method="POST" action="{{ route('product.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Product Name') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="name">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Description') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="description">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Base Price') }}</label>
                        <input type="text" class="form-control  orm-control"
                               name="base_price">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Discount Price') }}</label>
                        <input type="text"
                               class="form-control  orm-control"
                               name="discount_price">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Flag (Base OR Discount)') }}</label>
                        <select name="flag" class="form-control @error('flag') is-invalid @enderror orm-control"
                                id="inputGroupSelect01">
                            <option selected>Choose Flag...</option>
                            <option value="{{ 'base' }}">{{ __('Base Price') }}</option>
                            <option value="{{ 'discount' }}">{{ __('Discount Price') }}</option>
                        </select>
                        <label class="input-group-text" for="inputGroupSelect01"><i
                                class="material-icons opacity-10">{{ __('local_offer') }}</i></label>
                    </div>
                    <div class="input-group input-group-static mb-3">
                        <label>{{ __('Store Name') }}</label>
                        <select name="store_id" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Store...</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02"><i
                                class="material-icons opacity-10">{{ __('store') }}</i></label>
                    </div>
                    <div class="input-group input-group-static mb-3">
                        <label>{{ __('Photo') }}</label>
                        <input type="file" class="form-control orm-control"
                               name="photo" id="photo">
                        <label class="input-group-text"><i
                                class="material-icons opacity-10">{{ __('add_photo_alternate') }}</i></label>
                    </div>
                    <div class="text-center">
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
