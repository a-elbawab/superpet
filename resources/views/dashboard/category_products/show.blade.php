<x-layout :title="$category_product->name" :breadcrumbs="['dashboard.category_products.show', $category_product]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
            @slot('class', 'p-0')
            @slot('bodyClass', 'p-0')

            <table class="table table-striped table-middle">
                <tbody>
                    <tr>
                        <th width="200">@lang('category_products.attributes.name')</th>
                        <td>{{ $category_product->name }}</td>
                    </tr>
                </tbody>
            </table>

            @slot('footer')
            @include('dashboard.category_products.partials.actions.edit')
            @include('dashboard.category_products.partials.actions.delete')
            @include('dashboard.category_products.partials.actions.restore')
            @include('dashboard.category_products.partials.actions.forceDelete')
            @endslot
            @endcomponent
        </div>
    </div>
</x-layout>