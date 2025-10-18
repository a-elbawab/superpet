@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Invoice::class])
    @slot('url', route('dashboard.invoices.index'))
    @slot('name', trans('invoices.plural'))
    @slot('active', request()->routeIs('*invoices*'))
    @slot('icon', 'fa fa-dollar')
    @slot('tree', [
        [
            'name' => trans('invoices.actions.list'),
            'url' => route('dashboard.invoices.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Invoice::class],
            'active' => request()->routeIs('*invoices.index')
            || request()->routeIs('*invoices.show'),
        ],
        [
            'name' => trans('invoices.actions.create'),
            'url' => route('dashboard.invoices.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Invoice::class],
            'active' => request()->routeIs('*invoices.create'),
        ],
    ])
@endcomponent
