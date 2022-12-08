@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('Create Transaction') }}
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="card mt-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('Create Transaction') }}</h6>
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
                <form role="form" class="text-start" method="POST" action="{{ route('transaction.store') }}">
                    @csrf
                    <div class="input-group input-group-static mb-3">
                        <label>{{ __('Name Product') }}</label>
                        <select name="product_id"
                                class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Product...</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02"><i
                                class="material-icons opacity-10">{{ __('category') }}</i></label>
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
