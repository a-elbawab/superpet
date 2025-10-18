@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::textarea('paragraph') }}
{{ BsForm::textarea('paragraph2') }}
@endBsMultilangualFormTabs


@isset($slider)
    {{ BsForm::image('image[]')->collection('image')->files($slider->getMediaResource('image')) }}
@else
    {{ BsForm::image('image[]')->collection('image') }}
@endisset