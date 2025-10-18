@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Section::class])
    @slot('url', route('dashboard.sections.index'))
    @slot('name', trans('sections.plural'))
    @slot('active', request()->routeIs('*sections*'))
    @slot('icon', 'fa fa-signal')
    @slot('tree', [
        [
            'name' => trans('sections.actions.list'),
            'url' => route('dashboard.sections.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Section::class],
            'active' => request()->routeIs('*sections.index')
            || request()->routeIs('*sections.show'),
        ],
        [
            'name' => trans('sections.actions.create'),
            'url' => route('dashboard.sections.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Section::class],
            'active' => request()->routeIs('*sections.create'),
        ],
    ])
@endcomponent
