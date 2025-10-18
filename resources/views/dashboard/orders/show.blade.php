<x-layout :title="'#' . $order->id" :breadcrumbs="['dashboard.orders.show', $order]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

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
                            <th width="200">@lang('orders.attributes.user_id')</th>
                            <td>@if($order->user)<a href="{{ route('dashboard.customers.show', $order->user) }}">{{ optional($order->user)->name }}</a>@endif</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.status')</th>
                            <td><span class="badge badge-primary">{{ trans('orders.statuses.' . $order->status) }} </span></td>
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
                            <th width="200">@lang('orders.attributes.delivery_method')</th>
                            <td>{{ trans('orders.delivery_methods.' . $order->delivery_method) }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.area_id')</th>
                            <td>{{ $order->area?->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders.attributes.delivery_price')</th>
                            <td>{{ $order->delivery_price }}</td>
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

                @slot('footer')
                    @include('dashboard.orders.partials.actions.edit')
                    @include('dashboard.orders.partials.actions.delete')
                    @include('dashboard.orders.partials.actions.restore')
                    @include('dashboard.orders.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
