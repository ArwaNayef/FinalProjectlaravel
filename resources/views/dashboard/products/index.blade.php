@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('products') }}
@endsection

@section('search')
    <form class="form-inline" action="{{ URL('product/search') }}" method="get">
        <div class="input-group input-group-dynamic mb-3 border-radius-lg px-2 mx-3">
            <input type="search" placeholder="Search" name="search" class="form-control ">
            <div class="vr mt-2 ms-xl-2" style="height: 30px; width: 0.1px"></div>
            <div class="input-group-append pt-3 mx-1">
                <button class="text-primary border-0 mb-0" type="submit" style="background-color:transparent">
                    <i class="material-icons opacity-10">{{ __('search') }}</i>
                </button>
                <a class="text-primary btn-outline-primary-white mb-0 "
                   href="{{ route('products') }}">
                    <i class="material-icons opacity-10">{{ __('replay') }}</i>
                </a>
            </div>
        </div>
    </form>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('Products table') }}</h6>
                        </div>
                        <div class="col-6 text-end px-4 ">
                            <a class="text-white text-capitalize btn btn-outline-white btn-sm mb-0"
                               href="{{route('product.create')}}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;{{ __('Add New Product') }}</a>
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
                                Description
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Base Price
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Discount Price
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Flag
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
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
                                    <td class="mytable">
                                        <span class="text-xs font-weight-bold">{{ $product->description }}</span>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->base_price }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->discount_price }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->flag }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                           href="{{route('product.edit',$product->id)}}"><i
                                                class="material-icons text-sm me-2">edit</i>Edit</a>
                                        @if ($product->deleted_at)
                                            <form action="{{ URL('product/restore/'.$product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Restore ??')"
                                                        class="btn btn-link text-success px-3 mb-0"><i
                                                        class="material-icons text-sm me-2">restore_from_trash</i>Restore
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ URL('product/destroy/'.$product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Delete ??')"
                                                        class="btn btn-link text-danger px-3 mb-0"><i
                                                        class="material-icons text-sm me-2">delete</i>Delete
                                                </button>
                                            </form>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center">{{ __('No Products') }}</td>
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
@section('script')

@endsection
