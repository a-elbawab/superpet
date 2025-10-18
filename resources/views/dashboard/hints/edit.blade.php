<x-layout :title="$hint->name" :breadcrumbs="['dashboard.hints.edit', $hint]">
    {{ BsForm::resource('hints')->putModel($hint, route('dashboard.hints.update', $hint)) }}
    @component('dashboard::components.box')
        @slot('title', trans('hints.actions.edit'))

        @include('dashboard.hints.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('hints.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>