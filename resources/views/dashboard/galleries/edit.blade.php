<x-layout :title="$gallery->name" :breadcrumbs="['dashboard.galleries.edit', $gallery]">
    {{ BsForm::resource('galleries')->putModel($gallery, route('dashboard.galleries.update', $gallery)) }}
    @component('dashboard::components.box')
        @slot('title', trans('galleries.actions.edit'))

        @include('dashboard.galleries.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('galleries.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>