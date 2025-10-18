@can('create', \App\Models\Page::class)
    <a href="{{ route('dashboard.pages.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-plus"></i>
        @lang('pages.actions.create')
    </a>
@endcan
