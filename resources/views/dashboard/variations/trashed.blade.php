<x-layout :title="trans('variations.trashed')" :breadcrumbs="['dashboard.variations.trashed']">
    @include('dashboard.variations.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('variations.actions.list') ({{ $variations->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Variation::class }}"
                    :resource="trans('variations.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Variation::class }}"
                    :resource="trans('variations.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('variations.variations.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($variations as $variation)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$variation"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.variations.trashed.show', $variation) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $variation->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.variations.partials.actions.show')
                    @include('dashboard.variations.partials.actions.restore')
                    @include('dashboard.variations.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('variations.empty')</td>
            </tr>
        @endforelse

        @if($variations->hasPages())
            @slot('footer')
                {{ $variations->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
