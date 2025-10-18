@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Booking::class])
    @slot('url', route('dashboard.bookings.index'))
    @slot('name', trans('bookings.plural'))
    @slot('active', request()->routeIs('*bookings*'))
    @slot('icon', 'fa fa-ticket')
    @slot('tree', [
        [
            'name' => trans('bookings.actions.list'),
            'url' => route('dashboard.bookings.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Booking::class],
            'active' => request()->routeIs('*bookings.index')
            || request()->routeIs('*bookings.show'),
        ],
        [
            'name' => trans('bookings.actions.create'),
            'url' => route('dashboard.bookings.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Booking::class],
            'active' => request()->routeIs('*bookings.create'),
        ],
    ])
@endcomponent
