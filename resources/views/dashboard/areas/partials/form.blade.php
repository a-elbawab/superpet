@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

{{ BsForm::number('shipping_price')->min(0) }}

@isset($cityId)
    <input type="hidden" name="city_id" value="{{ $cityId }}">
@else
    <input type="hidden" name="city_id" value="{{ $city->id }}">
@endisset


