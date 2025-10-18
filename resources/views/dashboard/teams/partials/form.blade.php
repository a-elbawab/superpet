@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::text('title') }}
@endBsMultilangualFormTabs

@isset($team)
    {{ BsForm::image('image[]')->collection('image')->files($team->getMediaResource('image')) }}
@else
    {{ BsForm::image('image[]')->collection('image') }}
@endisset