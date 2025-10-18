<x-layout :title="trans('sections.trashed')" :breadcrumbs="['dashboard.sections.trashed']">
    @include('dashboard.sections.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('sections.actions.list') ({{ $sections->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Section::class }}"
                    :resource="trans('sections.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Section::class }}"
                    :resource="trans('sections.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('sections.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sections as $section)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$section"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.sections.trashed.show', $section) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $section->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.sections.partials.actions.show')
                    @include('dashboard.sections.partials.actions.restore')
                    @include('dashboard.sections.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('sections.empty')</td>
            </tr>
        @endforelse

        @if($sections->hasPages())
            @slot('footer')
                {{ $sections->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
