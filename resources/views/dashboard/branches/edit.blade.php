<x-layout :title="$branch->name" :breadcrumbs="['dashboard.branches.edit', $branch]">
    {{ BsForm::resource('branches')->putModel($branch, route('dashboard.branches.update', $branch)) }}
    @component('dashboard::components.box')
        @slot('title', trans('branches.actions.edit'))

        @include('dashboard.branches.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('branches.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>