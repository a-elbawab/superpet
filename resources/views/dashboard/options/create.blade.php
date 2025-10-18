<x-layout :title="trans('options.actions.create')" :breadcrumbs="['dashboard.options.create', $input]">
    {{ BsForm::resource('options')->post(route('dashboard.options.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('options.actions.create'))

        @include('dashboard.options.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('options.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
