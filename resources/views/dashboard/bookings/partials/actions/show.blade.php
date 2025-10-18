@if(method_exists($booking, 'trashed') && $booking->trashed())
    @can('view', $booking)
        <a href="{{ route('dashboard.bookings.trashed.show', $booking) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $booking)
        <a href="{{ route('dashboard.bookings.show', $booking) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif