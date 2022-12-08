@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('Edit Transaction ').$transaction->id }}
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
                <form role="form" class="text-start" method="POST"
                      action="{{ route('transaction.update',$transaction->id) }}"
                @csrf
                <div class="input-group input-group-static mb-3">
                    <label>{{ __('Name Product') }}</label>
                    <select name="product_id" class="form-control orm-control"
                            id="inputGroupSelect02">
                        <option selected>Choose Product...</option>
                        @foreach ($products as $product)
                            <option @if($transaction->product_id==$product->id) selected
                                    @endif value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label class="input-group-text" for="inputGroupSelect02"><i
                            class="material-icons opacity-10">{{ __('category') }}</i></label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label>{{ __('Price') }}</label>
                    <input type="text" class="form-control orm-control"
                           name="price" value="{{ $transaction->price }}" disabled>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label>{{ __('Time Of Transaction') }}</label>
                    <input type="datetime-local"
                           class="form-control orm-control"
                           name="time_of_transaction" value="{{ $transaction->time_of_transaction }}" disabled>
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
