<x-layout :title="trans('attributes.actions.create')" :breadcrumbs="['dashboard.attributes.create']">
    {{ BsForm::resource('attributes')->post(route('dashboard.attributes.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('attributes.actions.create'))

        @include('dashboard.attributes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('attributes.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
