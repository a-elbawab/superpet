<x-layout :title="trans('bookings.trashed')" :breadcrumbs="['dashboard.bookings.trashed']">
    @include('dashboard.bookings.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('bookings.actions.list') ({{ $bookings->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Booking::class }}"
                    :resource="trans('bookings.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Booking::class }}"
                    :resource="trans('bookings.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('bookings.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($bookings as $booking)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$booking"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.bookings.trashed.show', $booking) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $booking->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.bookings.partials.actions.show')
                    @include('dashboard.bookings.partials.actions.restore')
                    @include('dashboard.bookings.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('bookings.empty')</td>
            </tr>
        @endforelse

        @if($bookings->hasPages())
            @slot('footer')
                {{ $bookings->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
