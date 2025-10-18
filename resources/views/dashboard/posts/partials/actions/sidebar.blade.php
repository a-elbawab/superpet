@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Post::class])
    @slot('url', route('dashboard.posts.index'))
    @slot('name', trans('posts.plural'))
    @slot('active', request()->routeIs('*posts*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('posts.actions.list'),
            'url' => route('dashboard.posts.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Post::class],
            'active' => request()->routeIs('*posts.index')
            || request()->routeIs('*posts.show'),
        ],
        [
            'name' => trans('posts.actions.create'),
            'url' => route('dashboard.posts.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Post::class],
            'active' => request()->routeIs('*posts.create'),
        ],
    ])
@endcomponent
