@include('dashboard.errors')

@bsMultilangualFormTabs
    {{ BsForm::text('name') }}
@endBsMultilangualFormTabs

<input type="hidden" name="service_id" value="{{ isset($section) ? $section->service_id : $service->id }}">
