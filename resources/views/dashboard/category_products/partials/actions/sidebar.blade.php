@component('dashboard::components.sidebarItem')
@slot('can', ['ability' => 'viewAny', 'model' => \App\Models\CategoryProduct::class])
@slot('url', route('dashboard.category_products.index'))
@slot('name', trans('category_products.plural'))
@slot('active', request()->routeIs('*category_products*'))
@slot('icon', 'fas fa-th')
@slot('tree', [
    [
        'name' => trans('category_products.actions.list'),
        'url' => route('dashboard.category_products.index'),
        'can' => ['ability' => 'viewAny', 'model' => \App\Models\CategoryProduct::class],
        'active' => request()->routeIs('*category_products.index')
            || request()->routeIs('*category_products.show'),
    ],
    [
        'name' => trans('category_products.actions.create'),
        'url' => route('dashboard.category_products.create'),
        'can' => ['ability' => 'create', 'model' => \App\Models\CategoryProduct::class],
        'active' => request()->routeIs('*category_products.create'),
    ],
])
@endcomponent
