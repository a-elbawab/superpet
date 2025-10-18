@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Gallery::class])
    @slot('url', route('dashboard.galleries.index'))
    @slot('name', trans('galleries.plural'))
    @slot('active', request()->routeIs('*galleries*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('galleries.actions.list'),
            'url' => route('dashboard.galleries.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Gallery::class],
            'active' => request()->routeIs('*galleries.index')
            || request()->routeIs('*galleries.show'),
        ],
        [
            'name' => trans('galleries.actions.create'),
            'url' => route('dashboard.galleries.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Gallery::class],
            'active' => request()->routeIs('*galleries.create'),
        ],
    ])
@endcomponent
