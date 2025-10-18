<x-layout :title="trans('invoices.trashed')" :breadcrumbs="['dashboard.invoices.trashed']">
    @include('dashboard.invoices.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('invoices.actions.list') ({{ $invoices->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Invoice::class }}"
                    :resource="trans('invoices.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Invoice::class }}"
                    :resource="trans('invoices.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('invoices.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($invoices as $invoice)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$invoice"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.invoices.trashed.show', $invoice) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $invoice->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.invoices.partials.actions.show')
                    @include('dashboard.invoices.partials.actions.restore')
                    @include('dashboard.invoices.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('invoices.empty')</td>
            </tr>
        @endforelse

        @if($invoices->hasPages())
            @slot('footer')
                {{ $invoices->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
