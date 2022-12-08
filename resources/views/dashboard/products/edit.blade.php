@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('Edit Product ').$product->id }}
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card mt-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('Update Product') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 border-radius-lg ">
                @if(session()->has('status'))
                    @if(session()->get('status') == true)
                        <span class="alert alert-link text-success text-sm mb-3">* {{__('Updated Successfully')}}</span>
                    @endif
                @endif
                <form role="form" class="text-start" method="POST" action="{{ route('product.update',$product->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Product Name') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="name" value="{{$product->name}}">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Description') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="description" value="{{$product->description}}">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Base Price') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="base_price" value="{{$product->base_price}}">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label>{{ __('Discount Price') }}</label>
                        <input type="text"
                               class="form-control orm-control"
                               name="discount_price" value="{{$product->discount_price}}">
                    </div>
                    <div class="input-group input-group-outline mb-4">
                        <select name="flag" class="form-control orm-control"
                                id="inputGroupSelect01">
                            {{--                            <option selected>Choose Flag...</option>--}}

                            <option @if($product->discount_price=='base') selected
                                    @endif value="{{ 'base' }}">{{ __('Base Price') }}</option>
                            <option @if($product->discount_price=='discount') selected
                                    @endif value="{{ 'discount' }}">{{ __('Discount Price') }}</option>
                        </select>
                        <label class="input-group-text" for="inputGroupSelect01"><i
                                class="material-icons opacity-10">{{ __('local_offer') }}</i></label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <select name="store_id" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Store...</option>
                            @foreach ($stores as $store)
                                <option @if($product->store_id==$store->id) selected
                                        @endif value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02"><i
                                class="material-icons opacity-10">{{ __('store') }}</i></label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <img src="{{$product->photo}}" class="avatar avatar-sm rounded-circle me-2">
                        <input type="file" class="form-control orm-control"
                               name="photo" id="photo">
                        <label class="input-group-text"><i
                                class="material-icons opacity-10">{{ __('add_photo_alternate') }}</i></label>
                    </div>
                    @foreach ($errors->all() as $message)
                        <span class="alert alert-link text-danger text-sm">* {{ $message }}</span>
                    @endforeach
                    <div class="text-center">
                        <button type="submit" onclick="return confirm('Are You Sure To Update ??')"
                                class="btn bg-gradient-warning w-100 my-4 mb-2">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
