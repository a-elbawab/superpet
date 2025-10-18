@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}

{{ BsForm::text('meta_keywords')->placeholder('Comma, separated, keywords') }}
{{ BsForm::textarea('meta_description')->rows(rows: 2)->placeholder('Meta description') }}
@endBsMultilangualFormTabs

<select2
    placeholder="@lang('categories.attributes.parent_id')"
    name="parent_id"
    id="parent_id"
    value="{{ old('parent_id', isset($category) ? $category->parent_id : null) }}"
    label="@lang('categories.attributes.parent_id')"
    remote-url="{{ route('api.categories.select') }}"
></select2>

{{ BsForm::select('active')->options(trans('categories.active')) }}

@isset($category)
    {{ BsForm::image('image[]')->collection('image')->files($category->getMediaResource('image')) }}
@else
    {{ BsForm::image('image[]')->collection('image') }}
@endisset
