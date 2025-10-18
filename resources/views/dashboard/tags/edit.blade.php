<x-layout :title="$tag->name" :breadcrumbs="['dashboard.tags.edit', $tag]">
    {{ BsForm::resource('tags')->putModel($tag, route('dashboard.tags.update', $tag)) }}
    @component('dashboard::components.box')
        @slot('title', trans('tags.actions.edit'))

        @include('dashboard.tags.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('tags.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>