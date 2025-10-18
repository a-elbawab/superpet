<x-layout :title="trans('invoices.plural')" :breadcrumbs="['dashboard.invoices.index']">
    @include('dashboard.invoices.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('invoices.actions.list') ({{ $invoices->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Invoice::class }}"
                        :resource="trans('invoices.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.invoices.partials.actions.create')
                    @include('dashboard.invoices.partials.actions.trashed')
                </div>
            </div>
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
                    <a href="{{ route('dashboard.invoices.show', $invoice) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $invoice->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.invoices.partials.actions.show')
                    @include('dashboard.invoices.partials.actions.edit')
                    @include('dashboard.invoices.partials.actions.delete')
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
