@if($booking)
    @if(method_exists($booking, 'trashed') && $booking->trashed())
        <a href="{{ route('dashboard.bookings.trashed.show', $booking) }}" class="text-decoration-none text-ellipsis">
            {{ $booking->name }}
        </a>
    @else
        <a href="{{ route('dashboard.bookings.show', $booking) }}" class="text-decoration-none text-ellipsis">
            {{ $booking->name }}
        </a>
    @endif
@else
    ---
@endif