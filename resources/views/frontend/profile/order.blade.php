@extends('frontend.layout')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">@lang('orders.plural')</h2>

        <!-- جدول الطلبات -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5>@lang('orders.plural')</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                <table class="table table-striped table-middle">
                    <tbody>
                        <tr>
                            <th width="200">@lang('orders.attributes.name')</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.phone')</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.email')</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.address')</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.branch_id')</th>
                            <td>{{ optional($order->branch)->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.status')</th>
                            <td>
                                 @if ($order->status == \APP\Models\Order::STATUS_COMPLETED)
                                            <span
                                                class="badge badge-default text-success">{{ trans('orders.statuses.' . $order->status) }}
                                            </span>
                                        @else
                                            <span
                                                class="badge badge-default text-danger">{{ trans('orders.statuses.' . $order->status) }}
                                            </span>
                                        @endif
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.items')</th>
                            <td>
                                @foreach ($products as $product)
                                    product : <a href="{{ route('dashboard.products.show', $product) }}"><span
                                            class="badge badge-primary">{{ $product->name }}</span></a>
                                    <img class="img-fluid" style="max-width: 70px" src="{{ $product->main_image }}"
                                        alt="">
                                    <br>
                                    quantity : {{ $product->quantity }}
                                    <br>
                                    price : {{ $product->price }}
                                    <br>
                                @endforeach

                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.payment_method')</th>
                            <td>{{ trans('orders.payment_methods.' . $order->payment_method) }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.total')</th>
                            <td>{{ $order->total }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.discount')</th>
                            <td>{{ $order->discount }}</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>
@endsection
