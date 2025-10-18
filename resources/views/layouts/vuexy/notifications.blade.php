@if($notifications->isNotEmpty())
    @foreach($notifications as $notification)
        <a class="dropdown-item" href="{{ \App\Models\Notification::getUrl($notification) }}">
            <p class="mb-0">
                {{ $notification->data['message'] ?? Str::headline(class_basename($notification->type)) }}
            </p>
            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
        </a>
        <div class="dropdown-divider"></div>
    @endforeach

    <a class="dropdown-item" href="{{ route('dashboard.notifications.mark_as_read') }}">
        <p class="mb-0">@lang('dashboard.mark_all_as_read')</p>
    </a>
@else
    <p class="dropdown-item text-center mb-0">@lang('dashboard.no_new_notifications')</p>
@endif