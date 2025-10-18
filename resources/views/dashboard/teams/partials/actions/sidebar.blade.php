@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Team::class])
    @slot('url', route('dashboard.teams.index'))
    @slot('name', trans('teams.plural'))
    @slot('active', request()->routeIs('*teams*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('teams.actions.list'),
            'url' => route('dashboard.teams.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Team::class],
            'active' => request()->routeIs('*teams.index')
            || request()->routeIs('*teams.show'),
        ],
        [
            'name' => trans('teams.actions.create'),
            'url' => route('dashboard.teams.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Team::class],
            'active' => request()->routeIs('*teams.create'),
        ],
    ])
@endcomponent
