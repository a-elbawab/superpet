@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Tag::class])
    @slot('url', route('dashboard.tags.index'))
    @slot('name', trans('tags.plural'))
    @slot('active', request()->routeIs('*tags*'))
    @slot('icon', 'fa fa-file')
    @slot('tree', [
        [
            'name' => trans('tags.actions.list'),
            'url' => route('dashboard.tags.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Tag::class],
            'active' => request()->routeIs('*tags.index')
            || request()->routeIs('*tags.show'),
        ],
        [
            'name' => trans('tags.actions.create'),
            'url' => route('dashboard.tags.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Tag::class],
            'active' => request()->routeIs('*tags.create'),
        ],
    ])
@endcomponent
