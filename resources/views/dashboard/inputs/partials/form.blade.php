@include('dashboard.errors')


@bsMultilangualFormTabs
{{ BsForm::text('label') }}
@endBsMultilangualFormTabs

<input type="hidden" name="section_id" value="{{ isset($input) ? $input->section->id : $section->id }}">

{{ BsForm::select('type')->options(trans('inputs.types')) }}

{{ BsForm::select('required')->options(trans('inputs.required')) }}

{{ BsForm::number('order')->value(isset($input) ? $input->order : $order) }}

