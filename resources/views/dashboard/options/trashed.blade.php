<x-layout :title="trans('options.trashed')" :breadcrumbs="['dashboard.options.trashed']">
    @include('dashboard.options.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('options.actions.list') ({{ $options->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Option::class }}"
                    :resource="trans('options.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Option::class }}"
                    :resource="trans('options.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('options.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($options as $option)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$option"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.options.trashed.show', $option) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $option->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.options.partials.actions.show')
                    @include('dashboard.options.partials.actions.restore')
                    @include('dashboard.options.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('options.empty')</td>
            </tr>
        @endforelse

        @if($options->hasPages())
            @slot('footer')
                {{ $options->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
