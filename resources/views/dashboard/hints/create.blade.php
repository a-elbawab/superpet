<x-layout :title="trans('hints.actions.create')" :breadcrumbs="['dashboard.hints.create']">
    {{ BsForm::resource('hints')->post(route('dashboard.hints.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('hints.actions.create'))

        @include('dashboard.hints.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('hints.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>