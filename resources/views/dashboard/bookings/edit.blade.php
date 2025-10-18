<x-layout :title="$booking->name" :breadcrumbs="['dashboard.bookings.edit', $booking]">
    {{ BsForm::resource('bookings')->putModel($booking, route('dashboard.bookings.update', $booking)) }}
    @component('dashboard::components.box')
        @slot('title', trans('bookings.actions.edit'))

        @include('dashboard.bookings.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('bookings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>