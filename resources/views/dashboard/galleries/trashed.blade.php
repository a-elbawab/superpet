<x-layout :title="trans('galleries.trashed')" :breadcrumbs="['dashboard.galleries.trashed']">
    @include('dashboard.galleries.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('galleries.actions.list') ({{ $galleries->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Gallery::class }}"
                    :resource="trans('galleries.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Gallery::class }}"
                    :resource="trans('galleries.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('galleries.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($galleries as $gallery)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$gallery"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.galleries.trashed.show', $gallery) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $gallery->getFirstMediaUrl() }}"
                             alt="Image"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $gallery->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.galleries.partials.actions.show')
                    @include('dashboard.galleries.partials.actions.restore')
                    @include('dashboard.galleries.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('galleries.empty')</td>
            </tr>
        @endforelse

        @if($galleries->hasPages())
            @slot('footer')
                {{ $galleries->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
