<x-layout :title="$option->name" :breadcrumbs="['dashboard.options.edit', $option]">
    {{ BsForm::resource('options')->putModel($option, route('dashboard.options.update', $option)) }}
    @component('dashboard::components.box')
        @slot('title', trans('options.actions.edit'))

        @include('dashboard.options.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('options.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>