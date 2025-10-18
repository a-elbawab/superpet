<x-layout :title="trans('notifications.plural')" :breadcrumbs="['dashboard.notifications.index']">
    @push('styles')
        <style>
            .disabledbutton {
                pointer-events: none;
                opacity: 0.4;
            }
        </style>
    @endpush
    @slot('title', trans('notifications.plural'))

    {{ BsForm::resource('notifications')->post(route('dashboard.notifications.store')) }}

    @component('dashboard::components.box')
    @include('dashboard.errors')
        
        @include('dashboard.notifications.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('pages.actions.save')) }}
        @endslot
    @endcomponent

    {{ BsForm::close() }}

</x-layout>
