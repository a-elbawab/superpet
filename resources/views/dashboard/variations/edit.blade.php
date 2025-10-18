<x-layout :title="$variation->name" :breadcrumbs="['dashboard.variations.edit', $variation]">
    {{ BsForm::resource('variations')->putModel($variation, route('dashboard.variations.update', $variation)) }}
    @component('dashboard::components.box')
        @slot('title', trans('variations.actions.edit'))

        @include('dashboard.variations.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('variations.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>