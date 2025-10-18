@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::textarea('name')->rows(rows: 2) }}
@endBsMultilangualFormTabs

<input type="hidden" name="page_id" value="{{ isset($item) ? $item->page_id : request('page_id') }}">

@push('scripts')
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('name:ar', {
            contentsLangDirection: 'rtl'
        });
        CKEDITOR.replace('name:en', {
            contentsLangDirection: 'ltr'
        });
    </script>
@endpush