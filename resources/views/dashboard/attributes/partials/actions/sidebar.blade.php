@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Attribute::class])
    @slot('url', route('dashboard.attributes.index'))
    @slot('name', trans('attributes.plural'))
    @slot('active', request()->routeIs('*attributes*'))
    @slot('icon', 'fa fa-th')
    @slot('tree', [
        [
            'name' => trans('attributes.actions.list'),
            'url' => route('dashboard.attributes.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Attribute::class],
            'active' => request()->routeIs('*attributes.index')
            || request()->routeIs('*attributes.show'),
        ],
        [
            'name' => trans('attributes.actions.create'),
            'url' => route('dashboard.attributes.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Attribute::class],
            'active' => request()->routeIs('*attributes.create'),
        ],
    ])
@endcomponent
