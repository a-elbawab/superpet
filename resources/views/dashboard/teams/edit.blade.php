<x-layout :title="$team->name" :breadcrumbs="['dashboard.teams.edit', $team]">
    {{ BsForm::resource('teams')->putModel($team, route('dashboard.teams.update', $team)) }}
    @component('dashboard::components.box')
        @slot('title', trans('teams.actions.edit'))

        @include('dashboard.teams.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('teams.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>