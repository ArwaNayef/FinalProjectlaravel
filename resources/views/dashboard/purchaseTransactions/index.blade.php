@extends('layouts.mainlayout')

@section('Headtitle')
    {{ __('Transactions') }}
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">{{ __('Purchase Transaction table') }}</h6>
                        </div>
                        <div class="col-6 text-end px-4 ">
                            <a class="text-white text-capitalize btn btn-outline-white btn-sm mb-0"
                               href="{{route('report')}}"><i
                                    class="material-icons text-sm">summarize</i>&nbsp;&nbsp;{{ __('Show Report') }}</a>
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
                                Product Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Store Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Price
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Time Of Transaction
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($transactions)<1)
                            @foreach ($transactions as $transaction )
                                <tr class="height-100">
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $transaction->id }}</h6>
                                        {{--                                        <a href="{{route('store.show',$store->id)}}">{{ $store->id }}</a>--}}
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $transaction->product->name ?? null }}</p>

                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $transaction->product->store->name ?? null }}</p>

                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $transaction->price }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $transaction->time_of_transaction }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center">{{ __('No Purchase Transactions') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination justify-content-center">
        {{ $transactions->links() }}
    </div>
@endsection
@section('script')

@endsection
