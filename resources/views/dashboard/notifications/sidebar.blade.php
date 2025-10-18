@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.notifications.index'))
    @slot('name', trans('notifications.plural'))
    @slot('icon', 'far fa-bell fa-lg')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Card::class]),
    @slot('active', request()->routeIs('*notifications*'))
@endcomponent
