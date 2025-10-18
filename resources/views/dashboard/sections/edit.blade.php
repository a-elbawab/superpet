<x-layout :title="$section->name" :breadcrumbs="['dashboard.sections.edit', $section]">
    {{ BsForm::resource('sections')->putModel($section, route('dashboard.sections.update', $section)) }}
    @component('dashboard::components.box')
        @slot('title', trans('sections.actions.edit'))

        @include('dashboard.sections.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('sections.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>