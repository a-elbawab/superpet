<x-layout :title="trans('attributes.trashed')" :breadcrumbs="['dashboard.attributes.trashed']">
    @include('dashboard.attributes.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('attributes.actions.list') ({{ $attributes->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Attribute::class }}"
                    :resource="trans('attributes.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Attribute::class }}"
                    :resource="trans('attributes.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('attributes.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($attributes as $attribute)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$attribute"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.attributes.trashed.show', $attribute) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $attribute->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.attributes.partials.actions.show')
                    @include('dashboard.attributes.partials.actions.restore')
                    @include('dashboard.attributes.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('attributes.empty')</td>
            </tr>
        @endforelse

        @if($attributes->hasPages())
            @slot('footer')
                {{ $attributes->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
