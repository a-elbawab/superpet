@can('update', $booking)
    <a href="{{ route('dashboard.bookings.edit', $booking) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-edit"></i>
    </a>
@endcan
