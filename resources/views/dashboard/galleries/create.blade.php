<x-layout :title="trans('galleries.actions.create')" :breadcrumbs="['dashboard.galleries.create']">
    {{ BsForm::resource('galleries')->post(route('dashboard.galleries.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('galleries.actions.create'))

        @include('dashboard.galleries.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('galleries.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>