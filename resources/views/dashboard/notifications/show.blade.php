<x-layout :title="$notification->data['title'] ?? trans('notifications.attributes.title')" :breadcrumbs="['dashboard.notifications.show', $notification]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('notifications.attributes.title')</th>
                        <td>{{ $notification->data['title'] ?? trans('notifications.attributes.title') }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('notifications.attributes.body')</th>
                        <td>{{ $notification->data['body'] ?? trans('notifications.attributes.body')}}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('notifications.attributes.created_at')</th>
                        <td>{{ $notification->created_at->diffForHumans() }}</td>
                    </tr>

                    </tbody>
                </table>

                @slot('footer')
                     @include('dashboard.notifications.partials.actions.delete')
                @endslot
            @endcomponent

         </div>
    </div>
</x-layout>
