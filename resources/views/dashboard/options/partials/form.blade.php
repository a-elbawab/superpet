@include('dashboard.errors')

@bsMultilangualFormTabs
    {{ BsForm::text('name') }}
@endBsMultilangualFormTabs

{{ BsForm::text('value') }}
<input type="hidden" name="input_id" value="{{ $input->id }}">

