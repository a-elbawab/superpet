<x-layout :title="trans('hints.trashed')" :breadcrumbs="['dashboard.hints.trashed']">
    @include('dashboard.hints.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('hints.actions.list') ({{ $hints->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Hint::class }}"
                    :resource="trans('hints.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Hint::class }}"
                    :resource="trans('hints.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('hints.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($hints as $hint)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$hint"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.hints.trashed.show', $hint) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $hint->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.hints.partials.actions.show')
                    @include('dashboard.hints.partials.actions.restore')
                    @include('dashboard.hints.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('hints.empty')</td>
            </tr>
        @endforelse

        @if($hints->hasPages())
            @slot('footer')
                {{ $hints->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
