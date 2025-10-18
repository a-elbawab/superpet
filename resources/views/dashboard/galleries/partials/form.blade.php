@include('dashboard.errors')

@isset($gallery)
    {{ BsForm::image('image[]')->collection('image')->files($gallery->getMediaResource('image')) }}
@else
    {{ BsForm::image('image[]')->collection('image') }}
@endisset