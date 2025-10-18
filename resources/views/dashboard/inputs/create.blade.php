<x-layout :title="trans('inputs.actions.create')" :breadcrumbs="['dashboard.inputs.create', $section]">
    {{ BsForm::resource('inputs')->post(route('dashboard.inputs.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('inputs.actions.create'))

        @include('dashboard.inputs.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('inputs.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
