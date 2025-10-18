@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Slider::class])
    @slot('url', route('dashboard.sliders.index'))
    @slot('name', trans('sliders.plural'))
    @slot('active', request()->routeIs('*sliders*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('sliders.actions.list'),
            'url' => route('dashboard.sliders.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Slider::class],
            'active' => request()->routeIs('*sliders.index')
            || request()->routeIs('*sliders.show'),
        ],
        [
            'name' => trans('sliders.actions.create'),
            'url' => route('dashboard.sliders.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Slider::class],
            'active' => request()->routeIs('*sliders.create'),
        ],
    ])
@endcomponent
