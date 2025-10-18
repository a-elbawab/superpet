@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('paragraph')->rows(rows: 2) }}
@endBsMultilangualFormTabs

@isset($post)
    {{ BsForm::image('image[]')->files($post->getMediaResource()) }}
@else
    {{ BsForm::image('image[]') }}
@endisset


@push('scripts')
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>        <script>
                CKEDITOR.replace('paragraph:ar', {
                    contentsLangDirection: 'rtl'
                });
                CKEDITOR.replace('paragraph:en', {
                    contentsLangDirection: 'ltr'
                });
            </script>
@endpush