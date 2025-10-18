@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Option::class])
    @slot('url', route('dashboard.options.index'))
    @slot('name', trans('options.plural'))
    @slot('active', request()->routeIs('*options*'))
    @slot('icon', 'fa fa-list-ul')
    @slot('tree', [
        [
            'name' => trans('options.actions.list'),
            'url' => route('dashboard.options.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Option::class],
            'active' => request()->routeIs('*options.index')
            || request()->routeIs('*options.show'),
        ],
        [
            'name' => trans('options.actions.create'),
            'url' => route('dashboard.options.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Option::class],
            'active' => request()->routeIs('*options.create'),
        ],
    ])
@endcomponent
