@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Hint::class])
    @slot('url', route('dashboard.hints.index'))
    @slot('name', trans('hints.plural'))
    @slot('active', request()->routeIs('*hints*'))
    @slot('icon', 'fa fa-envelope')
    @slot('badge', count_formatted(\App\Models\Hint::notDone()->count()) ?: null)
@endcomponent
