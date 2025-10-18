<x-layout :title="$area->name" :breadcrumbs="['dashboard.cities.areas.edit', $city, $area]">
    {{ BsForm::resource('areas')
                ->putModel($area, route('dashboard.cities.areas.update', [$city, $area])) }}
    @component('dashboard::components.box')
        @slot('title', trans('areas.actions.edit'))

        @include('dashboard.areas.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('areas.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>