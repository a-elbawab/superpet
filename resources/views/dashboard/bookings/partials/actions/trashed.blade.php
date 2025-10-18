@can('viewAnyTrash', \App\Models\Booking::class)
    <a href="{{ route('dashboard.bookings.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('bookings.trashed')
    </a>
@endcan
