<x-layout :title="$category_product->name" :breadcrumbs="['dashboard.category_products.edit', $category_product]">
    {{ BsForm::resource('category_products')->putModel($category_product, route('dashboard.category_products.update', $category_product)) }}
    @component('dashboard::components.box')
    @slot('title', trans('category_products.actions.edit'))

    @include('dashboard.category_products.partials.form')

    @slot('footer')
    {{ BsForm::submit()->label(trans('category_products.actions.save')) }}
    @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>