@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('description')->rows(rows: 2) }}
@endBsMultilangualFormTabs

{{ BsForm::number('order') }}

{{ BsForm::select('home')->options([0 => 'No', 1 => 'Yes']) }}

@isset($service)
    {{ BsForm::image('image[]')->collection('image')->files($service->getMediaResource('image')) }}
    {{ BsForm::image('home_icon[]')->collection('home_icon')->files($service->getMediaResource('home_icon')) }}
@else
    {{ BsForm::image('image[]')->collection('image') }}
    {{ BsForm::image('home_icon[]')->collection('home_icon') }}
@endisset


@push('scripts')
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description:ar', {
            contentsLangDirection: 'rtl'
        });
        CKEDITOR.replace('description:en', {
            contentsLangDirection: 'ltr'
        });
    </script>
@endpush