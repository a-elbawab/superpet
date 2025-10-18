@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'manage', 'model' => \App\Models\Setting::class])
    @slot('url', '#')
    @slot('name', trans('settings.plural'))
    @slot('active', request()->routeIs('*settings*'))
    @slot('icon', 'fa fa-gears')
    @slot('tree', [
        [
            'name' => trans('settings.tabs.main'),
            'url' => route('dashboard.settings.index', ['tab' => 'main']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'main',
        ],
        [
            'name' => trans('settings.tabs.contacts'),
            'url' => route('dashboard.settings.index', ['tab' => 'contacts']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'contacts',
        ],
    ])
@endcomponent


