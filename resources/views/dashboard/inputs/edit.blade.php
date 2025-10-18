<x-layout :title="$input->name" :breadcrumbs="['dashboard.inputs.edit', $input]">
    {{ BsForm::resource('inputs')->putModel($input, route('dashboard.inputs.update', $input)) }}
    @component('dashboard::components.box')
        @slot('title', trans('inputs.actions.edit'))

        @include('dashboard.inputs.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('inputs.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>