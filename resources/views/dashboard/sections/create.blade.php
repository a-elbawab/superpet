<x-layout :title="trans('sections.actions.create')" :breadcrumbs="['dashboard.sections.create', $service]">
    {{ BsForm::resource('sections')->post(route('dashboard.sections.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('sections.actions.create'))

        @include('dashboard.sections.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('sections.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
