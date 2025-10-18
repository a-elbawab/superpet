<x-layout :title="$attribute->name" :breadcrumbs="['dashboard.attributes.edit', $attribute]">
    {{ BsForm::resource('attributes')->putModel($attribute, route('dashboard.attributes.update', $attribute)) }}
    @component('dashboard::components.box')
        @slot('title', trans('attributes.actions.edit'))

        @include('dashboard.attributes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('attributes.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>