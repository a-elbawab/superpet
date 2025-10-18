<x-layout :title="trans('notifications.plural')" :breadcrumbs="['dashboard.notifications.index']">

    @component('dashboard::components.table-box')
    @slot('title', trans('notifications.plural'))
    @slot('tools')
    @include('dashboard.notifications.partials.actions.create')
    @endslot
    <thead>
        <tr>
            <th>@lang('notifications.attributes.title')</th>
            <th>@lang('notifications.attributes.created_at')</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($notifications as $notification)
            <tr>
                <td>
                    {{ $data['message'] ?? Str::headline(class_basename($notification->type)) }}
                </td>
                <td>{{ $notification->created_at->diffForHumans() }}</td>

                <td>
                    @include('dashboard.notifications.partials.actions.show')

                    @include('dashboard.notifications.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('notifications.empty')</td>
            </tr>
        @endforelse

        @if($notifications->hasPages())
            @slot('footer')
                {{ $notifications->appends(request()->query())->links() }}
            @endslot
        @endif
        @endcomponent
</x-layout>