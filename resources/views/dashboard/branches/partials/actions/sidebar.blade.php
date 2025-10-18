@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Branch::class])
    @slot('url', route('dashboard.branches.index'))
    @slot('name', trans('branches.plural'))
    @slot('active', request()->routeIs('*branches*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('branches.actions.list'),
            'url' => route('dashboard.branches.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Branch::class],
            'active' => request()->routeIs('*branches.index')
            || request()->routeIs('*branches.show'),
        ],
        [
            'name' => trans('branches.actions.create'),
            'url' => route('dashboard.branches.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Branch::class],
            'active' => request()->routeIs('*branches.create'),
        ],
    ])
@endcomponent
