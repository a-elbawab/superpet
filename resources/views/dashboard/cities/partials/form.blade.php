@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

@isset($countryId)
    <input type="hidden" name="country_id" value="{{ $countryId }}">
@else
    <input type="hidden" name="country_id" value="{{ $country->id }}">
@endisset


