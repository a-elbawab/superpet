<x-layout :title="trans('variations.actions.create')" :breadcrumbs="['dashboard.variations.create', $attribute]">
    {{ BsForm::resource('variations')->post(route('dashboard.variations.store', $attribute)) }}
    @component('dashboard::components.box')
        @slot('title', trans('variations.actions.create'))

        @include('dashboard.variations.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('variations.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
