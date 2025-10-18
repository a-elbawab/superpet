@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Input::class])
    @slot('url', route('dashboard.inputs.index'))
    @slot('name', trans('inputs.plural'))
    @slot('active', request()->routeIs('*inputs*'))
    @slot('icon', 'fa fa-plus')
    @slot('tree', [
        [
            'name' => trans('inputs.actions.list'),
            'url' => route('dashboard.inputs.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Input::class],
            'active' => request()->routeIs('*inputs.index')
            || request()->routeIs('*inputs.show'),
        ],
        [
            'name' => trans('inputs.actions.create'),
            'url' => route('dashboard.inputs.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Input::class],
            'active' => request()->routeIs('*inputs.create'),
        ],
    ])
@endcomponent
