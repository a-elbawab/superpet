<x-layout :title="trans('category_products.actions.create')" :breadcrumbs="['dashboard.category_products.create']">
    {{ BsForm::resource('category_products')->post(route('dashboard.category_products.store')) }}
    @component('dashboard::components.box')
    @slot('title', trans('category_products.actions.create'))

    @include('dashboard.category_products.partials.form')

    @slot('footer')
    {{ BsForm::submit()->label(trans('category_products.actions.save')) }}
    @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>