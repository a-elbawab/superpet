@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Order::class])
    @slot('url', route('dashboard.orders.index'))
    @slot('name', trans('orders.plural'))
    @slot('active', request()->routeIs('*orders*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('orders.actions.list'),
            'url' => route('dashboard.orders.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Order::class],
            'active' => request()->routeIs('*orders.index')
            || request()->routeIs('*orders.show'),
        ],
        [
            'name' => trans('orders.actions.create'),
            'url' => route('dashboard.orders.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Order::class],
            'active' => request()->routeIs('*orders.create'),
        ],
    ])
@endcomponent
