{{ BsForm::resource('areas')->post(route('dashboard.cities.areas.store', $city)) }}
@component('dashboard::components.box')
    @slot('title', trans('areas.actions.create'))

    @include('dashboard.areas.partials.form', ['cityId' => $cityId ?? null])

    @slot('footer')
        {{ BsForm::submit()->label(trans('areas.actions.save')) }}
    @endslot
@endcomponent
{{ BsForm::close() }}
