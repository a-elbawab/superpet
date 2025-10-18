<x-layout :title="trans('attributes.plural')" :breadcrumbs="['dashboard.attributes.index']">
    @include('dashboard.attributes.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('attributes.actions.list') ({{ $attributes->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Attribute::class }}"
                        :resource="trans('attributes.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.attributes.partials.actions.create')
                    @include('dashboard.attributes.partials.actions.trashed')
                </div>
            </div>
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
                    <a href="{{ route('dashboard.attributes.show', $attribute) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $attribute->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.attributes.partials.actions.show')
                    @include('dashboard.attributes.partials.actions.edit')
                    @include('dashboard.attributes.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('attributes.empty')</td>
            </tr>
        @endforelse

        @if($attributes->hasPages())
            @slot('footer')
                {{ $attributes->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
