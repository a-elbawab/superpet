<x-layout :title="trans('sliders.trashed')" :breadcrumbs="['dashboard.sliders.trashed']">
    @include('dashboard.sliders.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('sliders.actions.list') ({{ $sliders->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Slider::class }}"
                    :resource="trans('sliders.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Slider::class }}"
                    :resource="trans('sliders.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('sliders.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sliders as $slider)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$slider"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.sliders.trashed.show', $slider) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $slider->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.sliders.partials.actions.show')
                    @include('dashboard.sliders.partials.actions.restore')
                    @include('dashboard.sliders.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('sliders.empty')</td>
            </tr>
        @endforelse

        @if($sliders->hasPages())
            @slot('footer')
                {{ $sliders->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
