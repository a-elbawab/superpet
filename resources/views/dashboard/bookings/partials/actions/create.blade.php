@can('create', \App\Models\Booking::class)
    <a href="{{ route('dashboard.bookings.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('bookings.actions.create')
    </a>
@endcan
