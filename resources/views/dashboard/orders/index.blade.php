<x-layout :title="trans('orders.plural')" :breadcrumbs="['dashboard.orders.index']">
    @include('dashboard.orders.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('orders.actions.list') ({{ $orders->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Order::class }}"
                        :resource="trans('orders.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.orders.partials.actions.create')
                    @include('dashboard.orders.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('orders.attributes.name')</th>
            <th>@lang('orders.attributes.status')</th>
            <th>@lang('orders.attributes.payment_method')</th>
            <th>@lang('orders.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$order"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.orders.show', $order) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $order->name }}
                    </a>
                </td>   
                <td>
                    {{ trans('orders.statuses.' . $order->status) }}
                </td>
                <td>
                    {{ trans('orders.payment_methods.' . $order->payment_method) }}
                </td>
                <td>
                    {{ $order->created_at->timezone('Africa/Cairo')->format('Y-m-d H:i') }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.orders.partials.actions.show')
                    @include('dashboard.orders.partials.actions.edit')
                    @include('dashboard.orders.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('orders.empty')</td>
            </tr>
        @endforelse

        @if($orders->hasPages())
            @slot('footer')
                {{ $orders->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
