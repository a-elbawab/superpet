<x-layout :title="trans('tags.actions.create')" :breadcrumbs="['dashboard.tags.create']">
    {{ BsForm::resource('tags')->post(route('dashboard.tags.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('tags.actions.create'))

        @include('dashboard.tags.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('tags.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>