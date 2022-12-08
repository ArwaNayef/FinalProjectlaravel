@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('report') }}
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('Report table') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive border-radius-lg p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Id
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Store
                                Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Total Of Purchase
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($products)<1)
                            @foreach ($products as $product )
                                <tr>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $product->id }}</h6>
                                        {{--                                        <a href="{{route('store.show',$store->id)}}">{{ $store->id }}</a>--}}
                                    </td>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="{{$product->photo}}"
                                                     class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                                <p class="mb-0 font-weight-bold text-sm">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->store->name ?? null }}</p>
                                    </td>
                                    <td>
                                        <h5>{{\App\Models\PurchaseTransaction::where('product_id',$product->id)->groupBy('product_id')->sum('price') }}</h5>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center">{{ __('No Transaction') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
