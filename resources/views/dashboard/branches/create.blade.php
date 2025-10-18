<x-layout :title="trans('branches.actions.create')" :breadcrumbs="['dashboard.branches.create']">
    {{ BsForm::resource('branches')->post(route('dashboard.branches.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('branches.actions.create'))

        @include('dashboard.branches.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('branches.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>