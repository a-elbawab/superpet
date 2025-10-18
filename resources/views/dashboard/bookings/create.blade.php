<x-layout :title="trans('bookings.actions.create')" :breadcrumbs="['dashboard.bookings.create']">
    {{ BsForm::resource('bookings')->post(route('dashboard.bookings.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('bookings.actions.create'))

        @include('dashboard.bookings.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('bookings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>