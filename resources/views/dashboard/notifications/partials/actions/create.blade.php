@can('viewAny', \App\Models\Notification::class)
    <a href="{{ route('dashboard.notifications.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-plus"></i>
        @lang('notifications.actions.create')
    </a>
@endcan
