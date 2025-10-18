@extends('frontend.layout')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">@lang('orders.plural')</h2>
        <!-- جدول الطلبات -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5>@lang('orders.plural')</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('orders.attributes.id')</th>
                                <th>@lang('orders.attributes.name')</th>
                                <th>@lang('orders.attributes.created_at')</th>
                                <th>@lang('orders.attributes.status')</th>
                                <th>@lang('orders.attributes.total')</th>
                                <th>@lang('orders.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
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
                                    <td>{{ $order->total }} @lang('frontend.currency')</td>
                                    <td>
                                        <a href="{{ route('front.me.orders.show', $order->id) }}"
                                            class="btn btn-sm btn-primary">@lang('orders.view')
                                        </a>
                                        @if ($order->status == \APP\Models\Order::STATUS_PENDING)
                                            <a href="{{ route('front.me.orders.delete', $order->id) }}"
                                                class="btn btn-sm btn-danger">@lang('orders.delete')
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">@lang('orders.no_orders')</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- التصفح -->
            <div class="card-footer">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection