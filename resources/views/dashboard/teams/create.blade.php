<x-layout :title="trans('teams.actions.create')" :breadcrumbs="['dashboard.teams.create']">
    {{ BsForm::resource('teams')->post(route('dashboard.teams.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('teams.actions.create'))

        @include('dashboard.teams.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('teams.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>